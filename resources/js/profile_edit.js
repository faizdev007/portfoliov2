import getdatalist from "./classlist";
if(window.location.pathname === '/profile'){
function build(type,attrbuitList = {}){
    const element = document.createElement(type);
    Object.entries(attrbuitList).forEach(([key,value])=>{
        if(key in element && key !== "role"){
            element[key] = value;
        }else{
            element.setAttribute(key,value);
        }
    });
    return element;
}

async function updateskillform() {
    // data calling async ////////////////////////
    let rooturl = window.location.origin;
    const skilllist = new getdatalist('skills');
    let datalist = await skilllist.skillsdata();
    // end here //////////////////////////////////////////////

    // Skill Display form Section
    const skillshow = document.createElement('div');
    skillshow.classList = `grid md:grid-cols-4 relative grid-cols-2 gap-5 mb-3 border-b py-3`;
    skillshow.id = 'skillshow';
    datalist.forEach(element => {
        let singleshowskill = build('div',{classList:'relative flex'});
        let removeskill = build('button',{type:'button',classList:'removeskill px-2 bg-blue1 border flex items-center justify-center right-0 rounded-r-full top-0'});
        removeskill.innerText = 'X';
        let singleskill = build('input',{type:'text',value:element.name,name:`skills[${element.id}]`,readonly:true,classList:'p-1 z-0 w-full text-center bg-gray-800 border-0 px-2 border rounded-l-full w-auto bg-gray-800 text-white'});
        singleshowskill.append(singleskill,removeskill);
        skillshow.append(singleshowskill);
    });

    
    // Create the main form
    const mainform = build('form',{action:`${rooturl}/updateskills`,method:"post",classList:'bg-white p-4'});
    
    // csrftoken
    const csrfInput = build('input',{type:'hidden',name:'_token',value:document.querySelector('meta[name="csrf-token"]').getAttribute('content')});
    
    // Form Title
    const title = build('h3',{classList:'font-bold text-center w-full border-b text-2xl uppercase'});
    title.innerText = 'Add New Skills';
    
    // Search Input Field
    let inputfield = build('input',{type:'text',autocomplete:'off',classList:'w-full rounded shadow p-2',name:'searchbox',id:'searchbox',placeholder:'search .....'});

    // Dropdown List (Initially Hidden)
    let dropdown = build('div',{id:'dropdown',classList:'absolute bg-white border rounded shadow-md mt-1 w-full max-h-40 overflow-y-auto hidden'});
    
    // end here ////////////////////////////////////////////////////////////////////////////


    // Function to filter and show search results
    inputfield.addEventListener('input', function () {
        let searchValue = this.value.toLowerCase();
        dropdown.innerHTML = ''; // Clear previous results

        if (searchValue.length > 0) {
            let filteredSkills = datalist.filter(skill => skill.name.toLowerCase().includes(searchValue));

            if (filteredSkills.length > 0) {
                dropdown.classList.remove('hidden'); // Show dropdown
                filteredSkills.forEach(skill => {
                    let option = document.createElement('p');
                    option.innerText = skill.name;
                    option.setAttribute('skillid',skill.id);
                    option.classList.add('p-2','optionselect', 'hover:bg-gray-200', 'cursor-pointer');
                    
                    option.addEventListener('click', function () {
                        inputfield.value = skill.name; // Select the skill
                        dropdown.classList.add('hidden'); // Hide dropdown
                    });

                    dropdown.appendChild(option);
                });
            } else {
                dropdown.classList.add('hidden'); // Hide if no results
            }
        } else {
            dropdown.classList.add('hidden'); // Hide if input is empty
        }
    });


    // Submit Button
    let submitbtn = build('button',{role:'button',classList:'w-full rounded-md p-2 text-white mt-2 bg-gray-700 hover:bg-gray-600'});
    submitbtn.innerText = 'Submit';


    skillshow.appendChild(dropdown);

    // Append elements to the form
    mainform.append(csrfInput, title, skillshow, inputfield, submitbtn);

    // Replace the existing skill form block
    document.getElementById('skillblock').replaceChildren(mainform);

    // click event to target spacific element /////////////////////////////////////////////////////

    document.addEventListener('click', function (event) {
        // Check if the clicked element has the class 'skilldropdown'
        if (event.target.classList.contains('optionselect')) {
            let singleshowskill = build('div',{classList:'relative'});
            let removeskill = build('button',{type:'button',classList:'removeskill -me-2 p-3 z-10 -mt-2 absolute bg-blue1 border flex h-5 items-center justify-center right-0 rounded-full top-0 w-5'});
            removeskill.innerText = 'X';
            let singleskill = build('input',{type:'text',value:event.target.innerText,name:`skills[${event.target.getAttribute('skillid')}]`,readonly:true,classList:'p-1 z-0 w-full text-center bg-gray-800 border-0 px-2 border rounded-full w-auto bg-gray-800 text-white'});
            singleshowskill.append(singleskill,removeskill);
            
            let skillshow = document.getElementById('skillshow');
            let findlist = Array.from(skillshow.children).map(child => child.firstChild.value );
            
            if(!findlist.includes(event.target.innerText)){
                skillshow.append(singleshowskill);
            }
            document.getElementById('searchbox').value = '';
        }

        if(event.target.classList.contains('removeskill')){
            let parent = event.target.closest('.relative');
            parent.remove();
        }
    });

    // end here /////////////////////////////////////////////////////////////////////////////////
}


document.addEventListener('DOMContentLoaded',function(){
    const skillupload = document.getElementById('addskill');
    const skillform = updateskillform();
    skillupload.addEventListener('click',function(){skillform;});    
});
}