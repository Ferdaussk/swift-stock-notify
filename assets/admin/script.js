
function addForm() {
    var container = document.getElementById('form-repeater-container');
    var formGroup = document.createElement('div');
    formGroup.className = 'ssnfy-form-group';

    var text1Label = document.createElement('label');
    text1Label.textContent = 'Text 1:';
    var text1Input = document.createElement('input');
    text1Input.type = 'text';
    text1Input.name = 'text1[]';
    text1Input.required = true;

    var text2Label = document.createElement('label');
    text2Label.textContent = 'Text 2:';
    var text2Input = document.createElement('input');
    text2Input.type = 'text';
    text2Input.name = 'text2[]';
    text2Input.required = true;

    var textareaLabel = document.createElement('label');
    textareaLabel.textContent = 'Textarea:';
    var textareaInput = document.createElement('textarea');
    textareaInput.name = 'textarea[]';
    textareaInput.rows = '4';
    textareaInput.required = true;

    formGroup.appendChild(text1Label);
    formGroup.appendChild(text1Input);
    formGroup.appendChild(text2Label);
    formGroup.appendChild(text2Input);
    formGroup.appendChild(textareaLabel);
    formGroup.appendChild(textareaInput);

    container.appendChild(formGroup);
}

function removeForm() {
    var container = document.getElementById('form-repeater-container');
    var formGroups = container.getElementsByClassName('ssnfy-form-group');
    
    if (formGroups.length > 1) {
        container.removeChild(formGroups[formGroups.length - 1]);
    }
}