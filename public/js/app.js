
function getdate()
{
    var d = document.getElementById("memberstate");
    var text =  document.querySelector("#returndate");
   
    var someDate = new Date();
    var numberOfDaysToAdd = 0;


    if(d.value == "Keine")
    {
        numberOfDaysToAdd = 30;
    }


    if(d.value == "Bronze")
    {
        numberOfDaysToAdd = 40;
    }


    if(d.value == "Silber")
    {
        numberOfDaysToAdd = 50;
    }


    if(d.value == "Gold")
    {
        numberOfDaysToAdd = 70;
    }


    someDate.setDate(someDate.getDate()+numberOfDaysToAdd);

    var day = someDate.getDate();
    var month = someDate.getMonth()+1;
    var year = someDate.getFullYear();

    let someFormattedDate = day+'/'+month+'/'+year;

    var displaytext = someFormattedDate;
    text.value = someFormattedDate;
    
}




function validateForm()
{
    var name = document.querySelector("#name");
    var email = document.querySelector("#email");
    var phone = document.querySelector("#phone");
    var memberstate = document.querySelector("#memberstate");
    var returndate = document.querySelector("#return");
    var movie_id = document.querySelector("#movie_id");

    var errorlist = [];

    if (name.value == '') {
        let error = 'Bitte geben Sie Ihren Namen ein!';
        errorlist.push(error);
    }

    if (email.value == '') {
        let error = 'Bitte geben Sie Ihre Email ein!';
        errorlist.push(error);
    }

    if (phone.value == '') {
        let error = 'Bitte geben Sie einen Namen ein!';
        errorlist.push(error);
    }

    if (memberstate.value == '') {
        let error = 'Mitgliedstatus eingeben!';
        errorlist.push(error);
    }

    if (returndate.value == '') {
        let error = 'Bitte wählen Sie den gewünschten Film aus!';
        errorlist.push(error);
    }

    document.getElementById("errors").innerHTML = JSON.stringify(errorlist, null, 2);
}








