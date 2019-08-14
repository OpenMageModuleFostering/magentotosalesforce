<?php

class Thylak_Magesalesforce_Adminhtml_MagesalesforceController extends Mage_Adminhtml_Controller_action
{


public function indexAction()
{   
    $this->loadLayout()
    ->_addContent($this->getLayout()->createBlock('magesalesforce/adminhtml_magesalesforce_magesalesforce'))
    ->renderLayout();
    //$this->_setActiveMenu('magesalesforce/magesalesforce');
}
public function thanksAction()
{   
    $this->loadLayout()
    ->_addContent($this->getLayout()->createBlock('magesalesforce/adminhtml_magesalesforce_thanks'))
    ->renderLayout();
    //$this->_setActiveMenu('magesalesforce/magesalesforce');
}
public function savemagesalesforceAction()
{
    $fname=$this->getRequest()->getPost('firstname');
    $lname=$this->getRequest()->getPost('lastname');
    $email=$this->getRequest()->getPost('email');
    $company=$this->getRequest()->getPost('company');
    $ph=$this->getRequest()->getPost('phoneno');
    $desc=$this->getRequest()->getPost('description');
    $qrystr =  'FirstName='.str_replace(" ","%20",$fname).'&LastName='.str_replace(" ","%20",$lname).'&Email='.str_replace(" ","%20",$email).'&CompanyName='.str_replace(" ","%20",$company).'&Phone1='.str_replace(" ","%20",$ph).'&CloseLeadComment='.str_replace(" ","%20",$desc).'&CreatedBy=139&SourceID=42';
    $url = "http://www.thylaksoft.com/addLead.aspx?".$qrystr;

    //$url = "http://173.15.158.230/timetracker/addlead.aspx?".$qrystr;
    $ch = curl_init() or die(curl_error());
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data1=curl_exec($ch) or die(curl_error());

    //echo "<font color=black face=verdana size=3>".$data1."</font>";
    //echo curl_error($ch);
    curl_close($ch);
    $this->getResponse()->setRedirect($this->getUrl('magesalesforce/adminhtml_magesalesforce/thanks/fname/'.$fname.'/lname/'.$lname, array('_secure'=>true)));
    return;
}   
}