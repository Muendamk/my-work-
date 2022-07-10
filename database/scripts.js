const sunMoonContainer = document.querySelector('.sun-moon-container')

document.querySelector('.theme-toggle-button').addEventListener('click', () => {
  document.body.classList.toggle('dark')
  const currentRotation = parseInt(getComputedStyle(sunMoonContainer).getPropertyValue('--rotation'))
  sunMoonContainer.style.setProperty('--rotation', currentRotation + 180)
})

ClassicEditor.create(document.querySelector("#body"), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
