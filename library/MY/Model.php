<?php
class MY_Model extends Zend_Db_Table_Abstract
{
	public function init()
	{
		parent::init();
	}
	
	public function check($key = null,$value=null)
	{
		$where = $this->_db->quoteInto($key."=?",$value);
		$result = $this->fetchAll($where)->toArray();
		return $result;
	}
	

	public function updateById($data = null, $id = null)
	{
		$where = $this->_db->quoteInto('id = ?',$id);
		return $this->update($data,$where);
	}
	
	public function updateByUsername($data = null, $username = null)
	{
		$where = $this->_db->quoteInto('username = ?',$username);
		return $this->update($data,$where);
	}
		
	public function findById($id)
	{
		$where = $this->_db->quoteInto('id=?',$id);
		$result = $this->fetchAll($where)->toArray();
		$user = null;
		if( isset($result[0]) )
		{
			$user = $result[0];
		}
		return $user;
	}
	
	public function deleteById($id)
	{
		$where = $this->_db->quoteInto('id=?',$id);
		$this->delete($where);
	}
	
	public function deleteByUsername($username)
	{
		$where = $this->_db->quoteInto('username=?',$username);
		$this->delete($where);
	}
}