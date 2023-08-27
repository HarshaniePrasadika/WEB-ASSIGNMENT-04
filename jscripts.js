const navLinks = [
  { label: "Home", link: "myweb.html" },
  { label: "About Us", link: "About.html" },
  { label: "Skills", link: "skills.html" },
  { label: "Work Place", link: "work.html" },
  { label: "Contact Us", link: "Contact.html" },
  
];

const navBarContainern = document.getElementById("nav-item");
const ul = document.createElement('ul');

  navLinks.forEach(link => {
    const li = document.createElement('li');
    const a = document.createElement('a');
    a.textContent = link.label;
    a.href = link.link;
    li.appendChild(a);
    ul.appendChild(li);
  });

  navBarContainern.appendChild(ul);

  var toggleButton = document.getElementById('toggleButton');
  var additionalInfo = document.getElementById('additionalInfo');
    
  toggleButton.addEventListener('click', function() {
      if (additionalInfo.style.display === 'none') {
        additionalInfo.style.display = 'block';
      } else {
        additionalInfo.style.display = 'none';
      }
    });

    function validatePhone() {
        const phone = document.getElementById("pnumber").value;
        // Telephone number should be in the format of 0XX-XXXXXXX 
        const regex = /^0[1-9][0-9]{1}-[0-9]{7}$/;
        if (!regex.test(phone)) {
          const phoneError = document.getElementById("phone-error");
          phoneError.textContent = "Telephone number should be in the format of 077-2246885";
        } else {
          const phoneError = document.getElementById("phone-error");
          phoneError.textContent = "";
        }
  }

  function email(){
    var email = document.getElementById("email").value;
	const mail = /^(\w+@)([a-z 0-9\-]{2,}.[a-z]{2,})$/;
    if (!mail.test(email)) {
        const mailError = document.getElementById("mail-error");
        mailError.textContent = "Invalid Email should be in the format of chan@gmail.com";
      } else {
        const mailError = document.getElementById("mail-error");
        mailError.textContent = "";
      }
  }
  function empty(){
    var arr=[];
    arr[0]=document.getElementById("name");
    arr[1]=document.getElementById("email");
	arr[2]=document.getElementById("pnumber");
	arr[3]=document.getElementById("sub");
	arr[4]=document.getElementById("mess");
	
	if(arr.length!=5){
    for(i=0;i<arr.length;i++){
        var text= arr[i];
        if(text.value.length ==0){
            alert("Fill all don't keep empty");
            return false;
		}
        }
	}
	else{
			alert("sent success");
            return true;
	}
  }
  
  
				
            
	
  
