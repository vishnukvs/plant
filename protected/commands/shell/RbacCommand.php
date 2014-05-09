<?php
class RbacCommand extends CConsoleCommand
{
    private $_authManager;
    public function getHelp()
    {
        return <<<EOD
USAGE
rbac
DESCRIPTION
This command generates an initial RBAC authorization hierarchy.
EOD;
    }
    
    /**
     * * Execute the action.
     * * @param array command line parameters specific for this command
     * */
    public function run($args)
    {
        //ensure that an authManager is defined as this is mandatory
        //for creating an auth heirarchy
        if(($this->_authManager=Yii::app()->authManager)===null)
        {
        echo "Error: an authorization manager, named 'authManager' must be configured to use this command.\n";
        echo "If you already added 'authManager' component in application configuration,\n";
        echo "please quit and re-enter the yiic shell.\n";
        return;
        }
        //provide the oportunity for the use to abort the request
        echo "This command will create three roles: Owner, mechanic, and Reader and the following premissions:\n";

        echo "create, read, update and delete User\n";
        echo "create, read, update and delete Plant Attribute\n";
        echo "create, read, update and delete Maintenance Events\n";
        echo "create, read, update and delete Service Schedules\n";
        echo "create, read, update and delete Repairs\n";
        echo "create, read, update and delete Risk Assessment\n";
        echo "create, read, update and delete Jobcard\n";

        echo "Would you like to continue? [Yes|No] ";
        
        //check the input from the user and continue if they indicated yes to
        //the above question
        if(!strncasecmp(trim(fgets(STDIN)),'y',1))
        {
            //first we need to remove all operations, roles, child relationship
            //and assignments
            $this->_authManager->clearAll();
            
            //create the lowest level operations for users
            $this->_authManager->createOperation("createUser","create a new user");
            $this->_authManager->createOperation("readUser","read user profile information");
            $this->_authManager->createOperation("updateUser","update a users information");
            $this->_authManager->createOperation("deleteUser","remove a user from login");
            
            //create the lowest level operations for Plant Attribute
            $this->_authManager->createOperation("createPlantAttribute","create a new Plant Attribute");
            $this->_authManager->createOperation("readPlantAttribute","read Plant Attribute information");
            $this->_authManager->createOperation("updatePlantAttribute","update Plant Attribute information");
            $this->_authManager->createOperation("deletePlantAttribute","delete a Plant Attribute");

            //create the lowest level operations for Maintenance Events
            $this->_authManager->createOperation("createMaintenanceEvents","create a new Maintenance Events");
            $this->_authManager->createOperation("readMaintenanceEvents","read Maintenance Events information");
            $this->_authManager->createOperation("updateMaintenanceEvents","update Maintenance Events information");
            $this->_authManager->createOperation("deleteMaintenanceEvents","delete a Maintenance Events");

            //create the lowest level operations for Service Schedules
            $this->_authManager->createOperation("createServiceSchedules","create a new Service Schedule");
            $this->_authManager->createOperation("readServiceSchedules","read Service Schedule information");
            $this->_authManager->createOperation("updateServiceSchedules","update Service Schedule information");
            $this->_authManager->createOperation("deleteServiceSchedules","delete a Service Schedule");
           
            //create the lowest level operations for Repairs
            $this->_authManager->createOperation("createRepairs","create a new Repair");
            $this->_authManager->createOperation("readRepairs","read Repair information");
            $this->_authManager->createOperation("updateRepairs","update Repair information");
            $this->_authManager->createOperation("deleteRepairs","delete a Repair");

            //create the lowest level operations for Risk Assessment
            $this->_authManager->createOperation("createRiskAssessment","create a new Risk Assessment");
            $this->_authManager->createOperation("readRiskAssessment","read Risk Assessment information");
            $this->_authManager->createOperation("updateRiskAssessment","update Risk Assessment information");
            $this->_authManager->createOperation("deleteRiskAssessment","delete a Risk Assessment");

            //create the lowest level operations for Job Card
            $this->_authManager->createOperation("createJobCard","create a new Job Card");
            $this->_authManager->createOperation("readJobCard","read Job Card information");
            $this->_authManager->createOperation("updateJobCard","update Job Card information");
            $this->_authManager->createOperation("deleteJobCard","delete a Job Card");
            
            
            //create the reader role and add the appropriate permissions as children to this role
            $role=$this->_authManager->createRole("reader");
            $role->addChild("readPlantAttribute");
            $role->addChild("readMaintenanceEvents");
            $role->addChild("readServiceSchedules");
            $role->addChild("readRepairs");
            $role->addChild("readRiskAssessment");            
            $role->addChild("readJobCard");   
            
            //create the mechanic role, and add the appropriate permissions, as well
            //as the reader role itself, as children
            $role=$this->_authManager->createRole("mechanic");
            $role->addChild("reader");
            $role->addChild("createMaintenanceEvents");
            $role->addChild("createServiceSchedules");
            $role->addChild("createRepairs");
            $role->addChild("createRiskAssessment");
            $role->addChild("createJobCard");

            
            //create the owner role, and add the appropriate permissions, as well
            //as both the reader and mechanic roles as children
            $role=$this->_authManager->createRole("owner");
            $role->addChild("reader");
            $role->addChild("mechanic");
            $role->addChild("createUser");
            $role->addChild("updateUser");
            $role->addChild("deleteUser");
            $role->addChild("createPlantAttribute");
            $role->addChild("updatePlantAttribute");
            $role->addChild("deletePlantAttribute");

            // update and delete MaintenanceEvents
            $role->addChild("updateMaintenanceEvents");
            $role->addChild("deleteMaintenanceEvents");            

            // update and delete ServiceSchedules
            $role->addChild("updateServiceSchedules");
            $role->addChild("deleteServiceSchedules");              
            
            // update and delete Repairs
            $role->addChild("updateRepairs");
            $role->addChild("deleteRepairs");  
 
            // update and delete Risk Assessment
            $role->addChild("updateRiskAssessment");
            $role->addChild("deleteRiskAssessment");              
            
            // update and delete Job Card
            $role->addChild("updateJobCard");
            $role->addChild("deleteJobCard");              

            //provide a message indicating success
            echo "Authorization hierarchy successfully generated.";
        }
    }
}
        
