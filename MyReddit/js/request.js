
    function postNewsEvent(){
        
        let body = new FormData(document.forms.postnews);


        let url = `/main/postNews`
        
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

    function updateNewsEvent(){
        
        let body = new FormData(document.forms.news_editor_form);


        let url = `/admin/update_news`
        
        fetch(url,{
            method:'POST',
            body:body
        })
        .then((response)=>{
          return  response.text()

           
        }).then((data)=>{
            console.log(data)
            document.querySelector('#postNews_response').innerHTML = data
            // if(data=="Успешно отправленно"){
            //     setTimeout(()=>{
            //         window.location.reload()
            //     },1000)
            // } 

          
        })
        console.log('lol')
    
    }

   
    function authEvent(){
        
        let body = new FormData(document.forms.form_authorization);


        let url = `/authorization/auth`
        
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


        let url = `/registration/addNewUser`

        
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


    function deleteNews (){
       
        if( confirm('Вы точно хотите удалить?')){
            let idNews =  event.currentTarget.dataset.id
            let params = new URLSearchParams(); 
            params.set('idNews', idNews);
           
            let url = `/admin/deleteNews`

            fetch(url,{
                method:'POST',
                body:params
            })
            .then((response)=>{
              return response.text()

            }).then((data)=>{
                console.log(data)
             
                if(data == "OK"){
                    setTimeout(()=>{
                    location.reload()
                    },500)
                } 
    
              
            })
        }
        
    }

    function deleteUser (){
       
        if( confirm('Вы точно хотите удалить?')){
            let idUser =  event.currentTarget.dataset.id
            let params = new URLSearchParams(); 
            params.set('idUser', idUser);
           
            let url = `/admin/deleteUser`

            fetch(url,{
                method:'POST',
                body:params
            })
            .then((response)=>{
              return response.text()

            }).then((data)=>{
                console.log(data)
             
                if(data == "OK"){
                    setTimeout(()=>{
                    location.reload()
                    },500)
                } 
    
              
            })
        }
        
    }

    function publishNews (){
       
        if( confirm('Вы точно хотите опубликовать?')){
            let idNews =  event.currentTarget.dataset.id
            let params = new URLSearchParams(); 
            params.set('idNews', idNews);
           
            let url = `/admin/publish`

            fetch(url,{
                method:'POST',
                body:params
            })
            .then((response)=>{
              return response.text()

            }).then((data)=>{
                console.log(data)
             
                if(data == "OK"){
                    setTimeout(()=>{
                    location.reload()
                    },500)
                } 
    
              
            })
        }
        
    }


    function sendForModerationNews (){
       
        if( confirm('Вы точно хотите снять с публикации?')){
            let idNews =  event.currentTarget.dataset.id
            let params = new URLSearchParams(); 
            params.set('idNews', idNews);
           
            let url = `/admin/sendForModerationNews`

            fetch(url,{
                method:'POST',
                body:params
            })
            .then((response)=>{
              return response.text()

            }).then((data)=>{
                console.log(data)
             
                if(data == "OK"){
                    setTimeout(()=>{
                    location.reload()
                    },500)
                } 
    
              
            })
        }
        
    }

