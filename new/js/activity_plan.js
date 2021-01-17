plan_controler = function($scope, $http, prihlasenie) {
    $scope.prava = prihlasenie;

    $scope.load = function() {
        $scope.rows = [];
        $http({
            method: 'POST',
            url: 'database/database_plan_load.php',
        }).then(function(result) {
            angular.forEach(result.data, function(item) {
                $scope.rows.push(
                    {
                        id: item.id,
                        datum: item.date,
                        akcia: item.activity,
                        popis: item.description
                    }
                );
            });
        });
    }
    $scope.load();

    $scope.save = {
        description: "",
        activity: "",
        date: ""
    };

    $scope.pridaj = function() {
        var today = new Date();
        var date = new Date($scope.save.date);
        if ($scope.save.description && $scope.save.activity && $scope.save.date && today <= date) {
            $scope.idUprava = -1;
            var dateStr = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
            $scope.pridavok = $.param({
                date: dateStr,
                activity: $scope.save.activity,
                description: $scope.save.description,
                author: $scope.prava.name
            });
            $http({
                method: 'POST',
                url: 'database/database_plan_add.php',
                data: $scope.pridavok,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(result){
                $scope.load();
            });
        }
    }

    $scope.zmaz = function(id){
        $scope.idUprava = -1;
        $scope.zmazanie = $.param({
            id: id
        })
        $http({
            method: 'POST',
            url: 'database/database_plan_delete.php',
            data: $scope.zmazanie,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(){
            $scope.load();
        });
    }
    
    $scope.idUprava = -1;
    $scope.update = {
        description: "",
        activity: "",
        date: new Date()
    }

    $scope.zacniUpravu = function(plan) {
        if($scope.idUprava == -1){
            $scope.idUprava = plan.id;
            $scope.update.date = new Date(plan.datum);
            $scope.update.activity = plan.akcia;
            $scope.update.description = plan.popis;
        }
    }

    $scope.ukonciUpravu = function(id) {
        $scope.idUprava = -1;
        var today = new Date();
        var date = new Date($scope.update.date);
        if ($scope.update.description && $scope.update.activity && $scope.update.date && today <= date) {
            var dateStr = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
            $scope.uprava = $.param({
                id: id,
                date: dateStr,
                activity: $scope.update.activity,
                description: $scope.update.description,
            });
            $http({
                method: 'POST',
                url: 'database/database_plan_update.php',
                data: $scope.uprava,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(){
                $scope.load();
            });
        }
    }

    $scope.zmena = function() {
    }
}

app.controller("plan_controler", plan_controler)