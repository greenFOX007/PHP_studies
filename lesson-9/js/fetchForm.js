
    function formEvent(){
        
        let body = new FormData(document.forms.form);


        let url = `response.php`
        // let body = `userName=${userName} userEmail=${userEmail} message=${message}`
        
        fetch(url,{
            method:'POST',
            body:body
        })
        .then((response)=>{
          return  response.text()

           
        }).then((data)=>{
            console.log(data)
            document.querySelector('#form_response').innerHTML = data
        })
    
    }

   
