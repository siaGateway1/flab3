<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;
    
    class User2Service{
        use ConsumesExternalService;
        /**
        * The base uri to consume the User2 Service
        * @var string
        */
        public $baseUri;
        public function __construct()
        {
        $this->baseUri =
        config('services.users2.base_uri');
        }
        /**
        * Obtain the full list of Users from User2 Site
        * @return string
        */
        public function obtainUsers2()
        {
        return $this->performRequest('GET','/users'); 
        }
        /**
        * Create one user using the User2 service
        * @return string
        */
        public function createUser2($data)
        {
        return $this->performRequest('POST', '/adduser',$data);
        }
        /**
        * Obtain one single user from the User2 service
        * @return string
        */
        public function obtainUser2($id)
        {
        return $this->performRequest('GET', "/getuser/{$id}");
        }
        /**
        * Update an instance of user2 using the User2 service
        * @return string
        */
        public function editUser2($data, $id)
        {
        return $this->performRequest('PUT',"/upuser/{$id}", $data);
}    
        /**
        * Remove an existing user
        * @return Illuminate\Http\Response
        */
        public function deleteUser2($id)
        {
        return $this->performRequest('DELETE', "/deluser/{$id}");
        }

}