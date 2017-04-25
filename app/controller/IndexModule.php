<?php
class IndexModule extends Base
{
	private function curl_post($url,$data)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL,$url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$data = curl_exec($curl);
		curl_close($curl);
		return $data;
	}
	public function guess()
	{
		$unit=$this->input('unit');
		$data=DB::query('select max(question) as qid from st_units where unit = '.intval($unit))->get();
		$maxqid=1;
		if($data){
			foreach($data as $row){
				$maxqid=$row->qid;
				break;
			}
		}
	 	if(!$maxqid){
			$maxqid=1;
		}
		$answer=0;
		if($maxqid>0){
			$data=DB::query('select max(answer) as aid from st_units where unit = '.intval($unit).' and question='.$maxqid)->get();
			if($data){
				foreach($data as $row){
					$answer=$row->aid;
					break;
				}
			}
		}
		else{
			$answer=1;
		}
		if($answer==4){
			$maxqid+=1;
			$answer=1;
		}
		else{
			$answer++;
		}
		return Array('maxqid'=>$maxqid,'answer'=>$answer);
	}
	public function fetchword()
	{
		$word=$this->input('word');
		$content=file_get_contents("http://dict-co.iciba.com/api/dictionary.php?type=json&w=$word&key=1CBBEB59031BED616943DEDF326F9C9B");
		$obj=json_decode($content,true);
		return $obj;
	}

	public function index()
	{
		$result=[];
		$unit=$this->input('unit',0);
		$pages=DB::table('units')->groupBy('unit')->orderBy('unit','asc')->select('unit')->get();
		$page=[];
		$next_unit=0;
		foreach($pages as $k=>$row){
			if($unit==0){
				$unit=$row->unit;
			}
			if($unit==$row->unit){
				if(isset($pages[$k+1])){
					$next_unit=$pages[$k+1]->unit;
				}
				else{
					$next_unit=$unit;
				}
			}
			$page[]=$row->unit;
		}

		$result['cur_unit']=$unit;
		$result['next_unit']=$next_unit;

		$data=DB::table('units')->where('unit','=',$unit)->orderBy('question','asc')->orderBy('id','asc')->get();
		$units=[];
		$qid=0;
		$result['page']=$pages;
		$result['data']=[];
		foreach($data as $row){
			$row->means=str_replace("\n","<br/>",$row->means);
			if($qid!=$row->question){
				if($units){
					$result['data'][$qid]=$units;	
				}
				$qid=$row->question;
				$units=[];
			}
			$units[]=$row;
		}
		if($units){
			$result['data'][$qid]=$units;	
		}
		return $result;
	}

	public function add()
	{
		$this->check();
		$unit=$this->input('unit');
		if(array_key_exists("action_add",$_POST)){
			$data=Array(
				'voice'=>$this->input('voice'),
				'word'=>$this->input('word'),
				'unit'=>$unit,
				'question'=>$this->input('question'),
				'answer'=>$this->input('answer'),
				'means'=>$this->input('means'),
				'updatetime'=>time()
			);
			DB::table('units')->insert($data);
		}
		$data=Array(
			'unit'=>$unit
		);
		return array_merge($data,$_POST);
	}
}
