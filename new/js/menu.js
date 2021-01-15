menu = function($scope, prihlasenie){
    $scope.prava = prihlasenie;

    $scope.odhlasenie = function(){
        sessionStorage.prihlaseny = null;
        sessionStorage.admin = null;
        prihlasenie.prihlaseny = false;
        prihlasenie.admin = false;
        delete sessionStorage;
    }
}

app.controller("menu_controler",menu);