<?php

/**
 * 
 */
class Purchases extends model{
	
	 public function addpurchases($uid, $ph_valor, $psckttransparente){

	 	$sql = "INSERT INTO purchases (ph_usr_id, ph_valor, ph_payment_type, ph_payment_status) 
	 	 		VALUES(:ph_usr_id, :ph_valor, :ph_payment_type, 1)";
	 	$sql = $this->db->prepare($sql);
	 	$sql->bindValue(':ph_usr_id', $uid);
	 	$sql->bindValue(':ph_valor', $ph_valor);
	 	$sql->bindValue(':ph_payment_type', $psckttransparente);	
	 	$sql->execute();

	 	return true;

	 }


}