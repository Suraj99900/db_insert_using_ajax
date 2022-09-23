//prevent from submit or refresh
var form = document.getElementById('my_form');
let tbody = document.getElementById('tbody');
function handleForm(event) {
    event.preventDefault();
}
form.addEventListener('submit', handleForm);


function clearErrors() {

    errors = document.getElementsByClassName('error_box');
    for (let item of errors) {
        item.innerHTML = "";
    }


}
function seterror(id, error) {
    //sets error inside tag of id 
    element = document.getElementById(id);
    element.getElementsByClassName('error_box')[0].innerHTML = error;

}

function validateForm() {
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var d_text = /\D/g;
    var d_text_only = /\d{10}/g;

    var fname = document.forms['reg_form']["fname"].value;
    var lname = document.forms['reg_form']["lname"].value;
    if (fname.length < 3) {

        seterror("fname", "*Length of name is too short");
        returnval = false;
    }
    if (!d_text.test(fname)) {
        seterror("fname", "*Enter only charecter");
        returnval = false;
    }

    if (fname == "" || fname == null) {
        seterror("fname", "*Please enter your Fname");
        returnval = false;
    }
    if (lname.length < 3) {
        seterror("lname", "*Length of name is too short");
        returnval = false;
    }
    if (!d_text.test(lname)) {
        seterror("lname", "*Enter only charecter");
        returnval = false;
    }
    if (lname == "" || lname == null) {
        seterror("lname", "*Please enter your Lname");
        returnval = false;
    }
    // email
    let email = document.forms['reg_form']['email'].value;
    if (email.length < 13 || email.length > 30) {

        seterror("email", "*your email length is not propar");
        returnval = false;
    }
    if (email == "" || email == null) {

        seterror("email", "*Enter your email");
        returnval = false;
    }

    // password

    let password = document.forms['reg_form']['password'].value;
    let c_password = document.forms['reg_form']['c_password'].value;
    if (password.length <= 6) {
        seterror("password", "*Your password lenght should grater than 6");
        returnval = false;
    }
    if (password == null || password == "") {
        seterror("password", "*Enter your password");
        returnval = false;
    }
    if (c_password != password) {
        seterror("c_password", "*password not match");
        returnval = false;
    }
    if (c_password == null || c_password == "") {
        seterror("c_password", "*Confirm your password");
        returnval = false;
    }

    // phone number

    let phone = document.forms['reg_form']['phone'].value;

    if (!d_text_only.test(phone)) {
        seterror("phone", "*Enter only number");
        returnval = false;
    }

    if (phone.length < 10) {

        seterror("phone", "*Phone number length is not propar");
        returnval = false;
    }
    if (phone.length > 10) {

        seterror("phone", "*Phone number length is not propar");
        returnval = false;
    }
    if (phone == "" || phone == null) {

        seterror("phone", "*Enter your phone number ");
        returnval = false;
    }




    return returnval;
}


function onSubmitForm() {



    //on submit of data

    let btn_submit = document.getElementById('btn_s');

    //on submit button click

    btn_submit.addEventListener('click', () => {

        if (validateForm() == true) {
            var f_name = document.forms['reg_form']['fname'].value;
            var l_name = document.forms['reg_form']['lname'].value;
            var email = document.forms['reg_form']['email'].value;
            var password = document.forms['reg_form']['password'].value;
            var number = document.forms['reg_form']['phone'].value;

            let data = {
                fname: f_name,
                lname: l_name,
                email: email,
                password: password,
                number: number,
                action_insert: true
            }

            let ajax = new XMLHttpRequest();
            ajax.open("POST", "insert.php", true);
            ajax.setRequestHeader("Content-Type", "application/json");
            ajax.onload = () => {
                if (ajax.responseText == "Data inserted in database successfully") {
                    document.getElementById('succ_box').innerText = ajax.responseText;
                    remove_item();
                    showData();

                } else {
                    document.getElementById('succ_box').innerText = ajax.responseText;

                }
            }
            ajax.send(JSON.stringify(data));

        }

    })
}

onSubmitForm();


// showing data 
function showData() {

    remove_item();

    console.log(tbody);

    var tr;
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "insert.php?show=" + true, true);
    ajax.onload = () => {
        if (ajax.response) {
            var data = JSON.parse(ajax.response)

            data.forEach(ele => {
                tr = document.createElement('tr');
                tr.setAttribute('class', 'tr_data');
                var td_1 = document.createElement('td');
                td_1.innerText = ele.srno;
                tr.append(td_1);
                var td_2 = document.createElement('td');
                td_2.innerText = ele.fname;
                tr.append(td_2);
                var td_3 = document.createElement('td');
                td_3.innerText = ele.lname;
                tr.append(td_3);
                var td_4 = document.createElement('td');
                td_4.innerText = ele.email;
                tr.append(td_4);
                var td_5 = document.createElement('td');
                td_5.innerText = ele.password;
                tr.append(td_5);
                var td_6 = document.createElement('td');
                td_6.innerText = ele.phone;
                tr.append(td_6);
                var td_7 = document.createElement('td');
                td_7.innerHTML = "<button class='btn btn_up' id=up" + ele.srno +" data-bs-toggle='modal' data-bs-target='#static'>update</button>";
                tr.append(td_7);
                var td_8 = document.createElement('td');
                td_8.innerHTML = "<button class='btn btn_del' id=" + ele.srno + ">delete</button>";
                tr.append(td_8);


                tbody.append(tr);
            });

            tbody.append(tr);

        } else {
            console.log("empty");
        }

    }

    ajax.send();
    
}

//remove item from the table
function remove_item() {
    document.querySelectorAll('.tr_data').forEach(ele => {
        ele.remove();
    });
}


//delete row from the table

function delete_item() {
    document.querySelectorAll('.btn_del').forEach(ele => {
        ele.addEventListener('click', () => {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", "insert.php?id=" + ele.id, true);

            ajax.onload = () => {
                console.log(ajax.response);
            }
            ajax.send();
            remove_item();
            showData();
            setTimeout(() => {
                delete_item()
                
            }, 500);
        })
    });
  

}



setTimeout(() => {
    delete_item()
}, 1000);


// updat data

let update = document.getElementById('btn_u');

update.addEventListener('click',()=>{

    setTimeout(() => {
        delete_item();
    }, 500);

    var srno = document.forms['up_form']['srno'].value;
    var fname = document.forms['up_form']['fname'].value;
    var lname = document.forms['up_form']['lname'].value;
    var email = document.forms['up_form']['email'].value;
    var number = document.forms['up_form']['phone'].value;

    var data = {
        srno :srno,
        fname:fname,
        lname:lname,
        email:email,
        number:number,
        action:"update"
    }

    var ajax = new XMLHttpRequest();

    ajax.open("POST", "insert.php", true);
    ajax.setRequestHeader("Content-Type", "application/json");

    ajax.onload = () =>{
        var msg = document.getElementById('succ_box');
        if(ajax.responseText == "Data updated in database successfully" ){
          
            msg.style.color = "green";
            msg.innerText = ajax.responseText;
            remove_item();
            showData();
        }else{
            msg.style.color = "red";
            msg.innerText = ajax.responseText;
            remove_item();
            showData();
        }

        var static= document.getElementById('static');
        static.classList.remove('show');
        static.style.display= "none";
        document.querySelector('.modal-backdrop ').remove();
        document.body.style.overflowY = "scroll";
    }

    ajax.send(JSON.stringify(data));
    
  
    
})



showData();