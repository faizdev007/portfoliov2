import axios from 'axios';
import Quill from 'quill';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


document.addEventListener('DOMContentLoaded', function() {
    var menuBtn = document.querySelector('#menubtn');
    if(menuBtn){
        menuBtn.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    
        document.getElementById('windomenubtn').addEventListener('click', function() {
            let spans = document.querySelectorAll('nav a span');
    
            spans.forEach(span => {
                span.classList.toggle('hidden');
            });
        });
    }

    setTimeout(() => {
        let alert = document.querySelector('.message');
        if(alert){
            alert.classList.add('hidden');
        }
    },'5000');
    
    document.addEventListener('submit',function(e){
        let submitButton = e.target.querySelector('[type="submit"]');
        
        if (submitButton) {
            // Disable the button to prevent multiple submissions
            submitButton.disabled = true;
            
            // Add a loading spinner (FontAwesome or custom animation)
            submitButton.innerHTML = `
            <div class="items-center justify-center flex w-full">
                <svg id="dots" width="100px" height="24px" viewBox="0 0 132 58" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="dots" sketch:type="MSArtboardGroup" fill="#A3A3A3">
                            <circle id="dot1" sketch:type="MSShapeGroup" cx="25" cy="30" r="13"></circle>
                            <circle id="dot2" sketch:type="MSShapeGroup" cx="65" cy="30" r="13"></circle>
                            <circle id="dot3" sketch:type="MSShapeGroup" cx="105" cy="30" r="13"></circle>
                        </g>
                    </g>
                </svg>
            </div>
            `;
        }
    });

    if(document.getElementById('posteditor') != undefined){
        const options = {
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'blockquote', 'image', 'code-block'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                ],
            },
            placeholder: 'write you blog here...',
            theme: 'snow'
          };
        const quill = new Quill('#posteditor', options);

        // document.getElementById('blogform').addEventListener('submit', function (event) {
        //     event.preventDefault(); // Prevent default form submission
        //     document.getElementById('blogpost').value = quill.root.innerHTML; // Store HTML content
    
        //     // Now submit the form
        //     this.submit();
        // });


        document.getElementById('postForm').addEventListener('submit', function (event) {
            document.getElementById('postcontent').value = quill.root.innerHTML; // Store Quill content
        });
    }

    if(document.getElementById('quilldescription') != undefined){
        const options = {
            modules: {
              toolbar: true,
            },
            placeholder: 'Write About Your self...',
            theme: 'snow'
        };

        const quill = new Quill('#quilldescription', options);

        document.getElementById('projectform').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            document.getElementById('description').value = quill.root.innerHTML; // Store HTML content
    
            // Now submit the form
            this.submit();
        });
    }



    // profile edit area quill editor

    if(document.getElementById('myselfeditor') != undefined){
        const options = {
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'blockquote', 'code-block'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                ],
            },
            placeholder: 'write here...',
            theme: 'snow'
          };
        const quill = new Quill('#myselfeditor', options);

        document.getElementById('profileeditor').addEventListener('submit', function (event) {
            document.getElementById('myselfdata').value = quill.root.innerHTML; // Store Quill content
        });
    }

    if(document.getElementById('summaryeditor') != undefined){
        const options = {
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'blockquote', 'code-block'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                ],
            },
            placeholder: 'write here...',
            theme: 'snow'
          };
        const quill = new Quill('#summaryeditor', options);

        document.getElementById('profileeditor').addEventListener('submit', function (event) {
            document.getElementById('summarydata').value = quill.root.innerHTML; // Store Quill content
        });
    }
});