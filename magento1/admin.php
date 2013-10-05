<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author fatih
 */
define("HOST", "localhost");
define("USER", "root");
define("PASS", "12345");
define("DB", "admin");

class admin 
{
    private $_host;
    private $_user;
    private $_pass;
    private $_db;
    private $_instance;
    
    public function __construct() 
    {
        $this->_host = HOST;
        $this->_user = USER;
        $this->_pass = PASS;
        $this->_db = DB;
        if (!isset($this->_instance)) 
        {
            $this->_instance = new mysqli($this->_host,  $this->_user,  $this->_pass,  $this->_db);
            $this->_instance->set_charset("utf8");
            return $this->_instance;
        }
        else
            return $this->_instance;
    }
    
    public function listUsers()
    {
	 $get =  $this->_instance->query('SELECT username FROM admin_user');

	 $deger ="<table border=1><thead><th><tr><th>Users</th></tr></thead><tbody>";
         
        
         while ($row = $get->fetch_assoc()) 
        {
            $deger .= "<tr><td>".$row["username"]."</td></tr>";
        }
        $deger .="</tbody></table>";
        return $deger;
    }
    public function getUserIds($data,$pass)
    {
        $get =  $this->_instance->query("SELECT user_id FROM admin_user WHERE username = '$data' AND password='$pass'");
        $row = $get->fetch_assoc();
        return $row['user_id'];
    }

    public function CheckIn($data, $pass)
    {
        $get =  $this->_instance->query("SELECT username,password FROM admin_user WHERE username = '$data' AND password='$pass'");
        $row = $get->fetch_assoc();
            if ($get->num_rows > 0)
                {
                    $oturum = $_SESSION['admin']=true;
                    echo "logged in as ".$data;
                    $_SESSION['admin'] = $data;
                }
            else
                {
                    echo "yanlis"; 
                }
    }

    
    function listRoles()
    {      
	 $get = $this->_instance->query('SELECT role_name FROM admin_role WHERE role_type = "G"');
         $deger ="<table border=1><thead><th><tr><th>Roles</th></tr></thead><tbody>";
        
                while ($row = $get->fetch_assoc()) 
               {
                   $deger .= "<tr><td>".$row["role_name"]."</td></tr>";
               }
               $deger .="</tbody></table>";
               return $deger;
    }

    function SaveUser($username, $firstname, $lastname, $email, $password,$is_active)
    {
        if(!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']))
        {
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $$lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $isactive = $_POST['is_active'];
            $created = date('Y/m/d'); 
            $modified = date('Y/m/d');
            $logdate = date('Y/m/d');
            $lognum = 1;
            $sql = $this->_instance->prepare("INSERT INTO admin_user (firstname,lastname,email,username,password,created,modified,logdate,lognum,is_active) VALUES(?,?,?,?,?,?,?,?,?,?)");
            $sql->bind_param('ssssssssii', $firstname,$lastname,$email,$username,$password,$created,$modified,$logdate,$lognum,$isactive);
             $sql->execute();
        }
        else
        {
            echo 'nothing changed';
        }

    }

    function AddRole()
    {
        $definedRoutes = array(
        '__root__' => '__root__',
        'admin/sales' => 'admin/sales',
        'admin/sales/order' => 'admin/sales/order',
        'admin/sales/order/actions' => 'admin/sales/order/actions'
        );
    if ( isset($_POST['resource']))
    {
        $ad = $_POST['role_name'];    
        $get = $this->_instance->query("INSERT INTO admin_role (parent_id,tree_level,sort_order,role_type,user_id,role_name) VALUES (0,1,0,'G',0,'$ad')");  	
        $last = $this->_instance->insert_id;
        $resources = $_POST['resource'];
        $allowedPermissions = array();
        foreach($resources as $k => $resource_id)
        {
            $allowedPermissions[$resource_id] = "allow";
            unset($definedRoutes[$resource_id]);
        }

        $disAllowedPermissions = array();
        foreach($definedRoutes as $dis_resource_id)
        {
            $disAllowedPermissions[$dis_resource_id] = "deny";
        }

            $totable = array_merge($allowedPermissions, $disAllowedPermissions );
            echo '<hr>';
        $sql = "INSERT INTO admin_rule
          (role_id,resource_id,role_type, permission)
        VALUES ";

        foreach($totable as $key => $value ){
            $sql.= "('$last','$key','G','$value'),";
        }
        $sql = substr($sql, 0, -1);

         $get = $this->_instance->query($sql);
        }
    }
    
    function listToPermit()
    {
        $get =  $this->_instance->query('SELECT username FROM admin_user');

             $deger ="<select name='users'>";

            while ($row =  $get->fetch_assoc()) 
            {
                $deger .= "<option value=".$row['username'].">".$row['username']."</option>";
            }
            $deger .="</select>";
            return $deger;	
    }

   function Permit($selectedrole,$selecteduser)
    {
            if(isset($_POST['users']) && isset($_POST['roles']))
            {
                $sql = "SELECT role_id FROM admin_role WHERE role_name  LIKE '%$selectedrole%' " ;
                $get =  $this->_instance->query($sql);
                $row = $get->fetch_assoc();
                $role_id = $row['role_id'];
                $sql = "SELECT user_id,firstname FROM admin_user WHERE username =  '$selecteduser'" ;
                $take =  $this->_instance->query($sql);
                $row = $take->fetch_assoc();
                $firstname = $row['firstname'];
                $user_id = $row['user_id'];
                $finalsql  =  "INSERT INTO admin_role (parent_id,tree_level,sort_order,role_type,user_id,role_name)VALUES ($role_id,2,0,'U','$user_id','$selecteduser') "; 
                $final = $this->_instance->query($finalsql);
            }          
            else 
                echo 'kullanici ve rol secin!';
    }
    function RolesToPermit()
    {
        $get =  $this->_instance->query('SELECT role_name,role_id FROM admin_role WHERE role_type = "G"');
        $deger = "<select name='roles'>";
            while ($row = $get->fetch_assoc())      
            {    
                $deger .= "<option value=".$row['role_name'].">".$row['role_name']."</option>";
            }
        $deger .="</select>";
        return $deger;
    }

     function showPermissions($role_id)  
    {
        $sql = "SELECT resource_id,permission FROM admin_rule WHERE role_id = ".$role_id. "";
        $get = $this->_instance->query($sql);
        $deger = "";
            while ($li = $get->fetch_assoc())
            {
                if($li['permission'] == 'allow')
                    $deger .= "<li><input type='hidden' name='permissionid' value='".$role_id."'/> <input type = 'checkbox' name='perm[]' value='".$li['resource_id']."' checked = 'checked' />".$li['resource_id']."</li>";
                elseif($li['permission'] == 'deny')
                    $deger .= "<li><input type='hidden' name='permissionid' value='".$role_id."'/><input type = 'checkbox' name='perm[]' value='".$li['resource_id']."'/>".$li['resource_id']."</li>";
            }
            $deger .= "</li><input type='submit'value = 'edit changes' name='edit' id='edit' />"; 
           
            return $deger;
    }

    function RoleToEdit()
    {
        $get = $this->_instance->query("SELECT role_id,role_name FROM admin_role WHERE role_type ='G'");
         $deger = "<select name='rolestoedit'>";

            while ($row = $get->fetch_assoc()) 
            {    
                $deger .= "<option value=".$row['role_id'].">".$row['role_name']."</option>";
              
            }
            $deger .="</select>";
            return $deger;
    }
    function EditChanges($permissions = null,$id)
    {
         $sql = "UPDATE admin_rule SET permission = 'deny' WHERE role_id = '$id' ";
         $get = $this->_instance->query($sql);
         if ($permissions != null)
         {
            foreach ($permissions as $key => $value)
            {   
                $sql = "UPDATE admin_rule SET permission = 'allow' WHERE resource_id = '$value' AND role_id='$id'";
                $get = $this->_instance->query($sql);
            }
         }
    }
    function EnablePages($user_id)
    {
        $blocks = array();
        $sql = "SELECT parent_id FROM admin_role WHERE user_id = $user_id";
        $ctrl2 = $this->_instance->query($sql);
        $getroleid = $ctrl2->fetch_assoc();
        $role_id = $getroleid['parent_id'];
        $sql1 = "SELECT resource_id FROM admin_rule WHERE permission = 'allow' AND role_id = $role_id";
        $getpages = $this->_instance->query($sql1);
        while ($row = $getpages->fetch_array(MYSQLI_ASSOC)) 
        {
            $blocks[] = $row['resource_id'];
        }
            $ourpagesa = '';
            $count = 1;
            $test = "0";
            $kont = 0;
           foreach ($blocks as $key => $value) 
           { 
                 if (preg_match("/(admin)\/(.*?)\/+$/", $value,$match)) 
                 { 
                    if ($test == 0 ) 
                    {
                        $ourpagesa .= "<li class='dropdown'><a id='dLabel".$count."' role='button' data-toggle='dropdown' data-target='#' href='#'>$match[2]<span class='caret'></span></a>";
                        $test = 1;
                    }
                    else
                    {
                        $count++;
                        $ourpagesa .= "</ul></li><li class='dropdown'><a id='dLabel".$count."' role='button' data-toggle='dropdown' data-target='#' href='#'>$match[2]<span class='caret'></span></a>";
                        $kont=0;
                    }
                   
                 }
                elseif (preg_match('/(admin\/(.*?)\/.*)/', $value)) 
                {
                    if ($kont == 0 ) 
                    {
                        $ourpagesa .= "<ul class='dropdown-menu' role='menu' aria-labelledby='dLabel".$count."'><li><a href = '$value'>".$value."</a></li>";
                        $kont = 1;
                    }
                    else
                        $ourpagesa .="<li><a href = '$value'>".$value."</a></li>";
                    
                }      
            }
       $ourpagesEnd ='</li>';
        return $ourpagesa.$ourpagesEnd;       
    }
}  
