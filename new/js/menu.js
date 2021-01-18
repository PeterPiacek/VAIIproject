menu = function($scope, prihlasenie){
    $scope.prava = prihlasenie;

    $scope.odhlasenie = function(){
        sessionStorage.prihlaseny = null;
        sessionStorage.admin = null;
        sessionStorage.name = null;
        prihlasenie.prihlaseny = false;
        prihlasenie.admin = false;
        prihlasenie.name = "";
        delete sessionStorage;
    }
}

app.controller("menu_controler",menu);