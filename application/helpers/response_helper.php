<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//some functions to have a common response structure

//return a success response
if ( ! function_exists('success_response'))
{
    function success_response($inc_data,$status = 200)
    {
        $data = $inc_data;
        $data['code'] = (isset($data['code']) ? $data['code'] : $status);
        $data['title'] = (isset($data['title']) ? $data['title'] : 'Title');
        $data['message'] = (isset($data['message']) ? $data['message'] : 'Success'); 
        http_response_code($data['code']);
        echo json_encode($data);
        exit();
    }   
}

//return an error response
if ( ! function_exists('error_response'))
{
    function error_response($inc_data,$status = 400)
    {
        $data = $inc_data;
        $data['code'] = (isset($data['code']) ? $data['code'] : $status);
        $data['title'] = (isset($data['title']) ? $data['title'] : 'Title'); 
        $data['message'] = (isset($data['message']) ? $data['message'] : 'Error'); 
        //http_response_code($data['code']);
        echo json_encode($data);
        exit();
    }   
}

//return validation error response
if ( ! function_exists('validation_error_response'))
{
    function validation_error_response($inc_data,$status = 422)
    {   
        $data = $inc_data;
        $data['code'] = (isset($data['code']) ? $data['code'] : $status);
        $data['message'] = (isset($data['message']) ? $data['message'] : 'Invalid Data !. Please check again');
        $data['errors'] = (isset($data['errors']) ? $data['errors'] : '');
        http_response_code($data['code']); 
        echo json_encode($data);
        exit();
    }   
}
/**
 * Redirect to previous page if http referer is set. Otherwise to server root.
 */
 
if ( ! function_exists('redirect_back'))
{
    function redirect_back()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }
}

//redirect to a given location
if ( ! function_exists('redirect_to'))
{
    function redirect_to($path,$outside = false)
    {
        if(!$outside)
        {
            header('Location: '.base_url($path));
        }
        else
        {
            header('Location: '.$path);
        }
        exit;
    }
}

//return a date error response
if ( ! function_exists('date_error_response'))
{
    function date_error_response($inc_date, $label)
    {
        if(!is_date($inc_date)){
            $data = array();
            $data['message'] = "Invalide Date for $label";
            error_response($data);
            exit();
        }
       
    }   
}

//return a date error response
if ( ! function_exists('datetime_error_response'))
{
    function datetime_error_response($inc_date, $label)
    {
        if(!is_date_time($inc_date)){
            $data = array();
            $data['message'] = "Invalide Datetime for $label";
            error_response($data);
            exit();
        }
       
    }   
}
