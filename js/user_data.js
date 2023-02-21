/*function ShowUpdateForm(index){

    console.log(index)

    var ButtonHide = String('.ShowUpdateButton' + index);
    var UpdateForm = String('.UpdateValuesForm' + index);
    
    console.log(ButtonHide);
    console.log(UpdateForm);

    document.getElementById(UpdateForm).style.display = 'block';
    document.getElementById(ButtonHide).style.display = 'none';
    

};*/

document.querySelectorAll('.ShowUpdateForm')
    .forEach(function (element) {
    element.addEventListener('click', function (event) {
        let clickedBtn = event.target;
        console.log(clickedBtn);
        clickedBtn.nextElementSibling.style.display = 'block';
        clickedBtn.style.display = 'none';
    });
});