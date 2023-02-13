
    function postNewsEvent(){
        
        let body = new FormData(document.forms.postnews);


        let url = `/application/request/postnewsrequest.php`
        
        fetch(url,{
            method:'POST',
            body:body
        })
        .then((response)=>{
          return  response.text()

           
        }).then((data)=>{
            console.log(data)
            document.querySelector('#postNews_response').innerHTML = data
            if(data=="Успешно отправленно"){
                setTimeout(()=>{
                    window.location.reload()
                },1000)
            } 

          
        })
        console.log('lol')
    
    }

   
    function authEvent(){
        
        let body = new FormData(document.forms.form_authorization);


        let url = `/application/request/authrequest.php`
        
        fetch(url,{
            method:'POST',
            body:body
        })
        .then((response)=>{
          return  response.text()

           
        }).then((data)=>{
            console.log(data)
            document.querySelector('#formAuthorization_response').innerHTML = data
            if(data=="OK"){
                setTimeout(()=>{
                    window.location = '/'
                },1000)
            } 

          
        })
    
    }


       
    function registrationEvent(){
        
        let body = new FormData(document.forms.registration_form);


        let url = `/application/request/registrationrequest.php`

        
        fetch(url,{
            method:'POST',
            body:body
        })
        .then((response)=>{
          return response.text()

           
        }).then((data)=>{
            console.log(data)
            document.querySelector('#formRegistration_response').innerHTML = data
            if(data == "<p style='color:green;'>Вы спушно зарегистрировались!</p>"){
                setTimeout(()=>{
                    window.location = "/authorization"
                },1000)
            } 

          
        })
    
    }