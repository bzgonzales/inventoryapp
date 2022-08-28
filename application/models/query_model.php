<?php 

/**
*  Qry Model
*/

class Query_model extends Model{
	
	function __Construct()
	{
		parent::__construct();
	}

	public function test($data=''){
		return $data;
	}
	
	public function verify_login($user_name, $password)
	{

		$stmt = $this->db->prepare('SELECT * FROM users WHERE user_name = ? AND password=?');
		$stmt->execute([$user_name, $password]);
		$user = $stmt->fetch();

		if ($user) {
			return $user;
		} else {
			return false;
		}
		
	}

	public function get_clients()
	{

		$stmt = $this->db->prepare('SELECT * FROM clients');
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($arr) {
			return $arr;
		} else {
			return false;
		}
		
	}

	public function get_items($s = array()){

		$query = 'SELECT * FROM items ';


		if(@$s['clientids'] ){
			if(is_array($s['clientids'])){
				$clients = implode(',', $s['clientids']);
			}else{
				$clients = $s['clientids'];
			}
			
			$query .= 'Where client_id IN(' . $clients. ')';
		}

		$total = $this->db->query($query)->rowCount();

		if(@$s['length']){
			$query .= ' LIMIT ' . $s['length'] . ' OFFSET ' . $s['start'] ;
		}

		// echo $query;
		// exit();

		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// show_log($this->db->last_query());
		// exit();
		return (object) array('records_total' => @$total, 'records_filtered' => $arr);

	}

	public function get_orders($s=''){

		$query = 'SELECT * FROM orders as oo ';
		$query .= 'LEFT JOIN clients as cc ON oo.client_id = cc.client_id ';

		$where = 0;

		if(@$s['clientids'] ){
			$where = 1;
			$clients = implode(',', $s['clientids']);			
			$query .= 'Where oo.client_id IN(' . $clients. ')';
		}

		if(@$s['startdate'] ){
			$wherein = (!$where)? 'Where' : ' AND';
			$where = 1;
			$query .= $wherein." oo.delivery_date between '".$s['startdate']."' and '".$s['enddate']."'";
		}

		$wherein = (!$where)? 'Where' : ' AND';
		$query .= $wherein.' oo.status != 0' ;

		$total = $this->db->query($query)->rowCount();

		$query .= ' ORDER BY oo.delivery_date desc' ;

		if(@$s['length']){
			$query .= ' LIMIT ' . $s['length'] . ' OFFSET ' . $s['start'] ;
		}
		// echo $query;
		// exit();


		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return (object) array('records_total' => @$total, 'records_filtered' => $arr);

	}

	public function get_order($order_id='')
	{

		$stmt = $this->db->prepare('SELECT * FROM orders WHERE order_id = '.$order_id);
		$stmt->execute();
		$order = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($order) {
			return $order;
		} else {
			return false;
		}
		
	}


	

	public function insert_order($d='')
	{

		$stmt = $this->db->prepare('INSERT INTO orders(client_id, delivery_date, customer_name, customer_address, zip_code, status)
        VALUES(?,?,?,?,?,?)');
		$stmt->execute([@$d['client'],@$d['deliverydate'],@$d['custname'],@$d['custaddress'],@$d['zipcode'],@$d['status']]);
		return true;
		
	}

	public function save_order($d='')
	{

		$sql = "UPDATE orders SET client_id=?, delivery_date=?, customer_name=?, customer_address=?, zip_code=?, status=? WHERE order_id=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([@$d['client'],@$d['deliverydate'],@$d['custname'],@$d['custaddress'],@$d['zipcode'],@$d['status'],@$d['orderid']]);
		return true;
		
	}

}