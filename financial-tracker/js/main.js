// Enter JavaScript for the exercise here...

var timeout;
var transCount = -1;
var debitSpan = document.querySelector('span.debits');
var creditSpan = document.querySelector('span.credits');
var description = document.querySelectorAll('input.frm-control')[0];
var type = document.querySelector('select.frm-control');
var amount = document.querySelectorAll('input.frm-control')[1];

function startTimer() {
    timeout = window.setTimeout(function() {
        alert('You have not done anything in two minutes. The page will now refresh');
        window.location.reload(true);
    }, 120000);
}

function inactivity() {
    document.addEventListener("mousemove", resetTimer);
    document.addEventListener("mousedown", resetTimer);
    document.addEventListener("keypress", resetTimer);
    startTimer();
}
inactivity();

function resetTimer() {
    window.clearTimeout(timeout);
    startTimer();
}

function moneyAmount(x){
    return Number.parseFloat(x).toFixed(2);
}

document.querySelector('.frm-transactions').addEventListener('submit', function(evt){
    var tr = document.createElement('tr');
    tr.setAttribute('class', type.value);
    tr.setAttribute('data-amount', amount.value);
    document.querySelector('tbody').appendChild(tr);

    function tableData(message) {
        var td = document.createElement('td');
        var text = document.createTextNode(message);
        td.appendChild(text);
        tr.appendChild(td);
    } 

    function amountTd(message, className) {
        var td = document.createElement('td');
        var dollarSign = document.createTextNode('$');
        var text = document.createTextNode(message);
        td.setAttribute('class', className);
        td.appendChild(dollarSign);
        td.appendChild(text);
        tr.appendChild(td);
    } 

    function icon(){
        var td = document.createElement('td');
        var i = document.createElement('i');
        i.setAttribute('class', 'delete fa fa-trash-o');
        td.setAttribute('class', 'tools');
        td.appendChild(i);
        tr.appendChild(td);
    }

    var errorDiv = document.querySelector('div.error');
    function error(message, name){
        var errorParagraph = document.createElement('p');
        var errorMessage = document.createTextNode(message);
        errorParagraph.appendChild(errorMessage);
        errorParagraph.setAttribute('class', name);
        errorDiv.appendChild(errorParagraph);
    }

    function errorCheck(value, paraNum, classNum, message){
        if(value < 0){
            if(!errorDiv.contains(document.querySelector(paraNum))){
                error(message, classNum);
            } 
        } else if(value > 0){
            if(errorDiv.contains(document.querySelector(paraNum))){
                var paraError = document.querySelector(paraNum);
                errorDiv.removeChild(paraError);
            } 
        } else if(value.trim() == ''){
            if(!errorDiv.contains(document.querySelector(paraNum))){
                error(message, classNum);
            } 
        } else if(!value.trim() == ''){
            if(errorDiv.contains(document.querySelector(paraNum))){
                var paraError = document.querySelector(paraNum);
                errorDiv.removeChild(paraError);
            } 
        } 
    }
    errorCheck(description.value, 'p.one', 'one', 'Please enter a description');
    errorCheck(type.value, 'p.two', 'two', 'Please select a type from the options');
    errorCheck(amount.value, 'p.four', 'four', 'Please enter a positive amout');

    function addTotal(typeSpan){
        var total = Number(moneyAmount(amount.value)) + Number(typeSpan.childNodes[0].data.substring(1, typeSpan.childNodes[0].data.length));
        typeSpan.childNodes[0].data = '$' + moneyAmount(total);
    }

    if(!description.value.trim() == '' && !type.value == '' && amount.value > 0 && !amount.value == ''){
        tableData(description.value);
        tableData(type.value);
        amountTd(moneyAmount(amount.value), 'amount');
        icon();
        transCount = transCount + 1;
        if(type.value == 'debit'){
            addTotal(debitSpan);
        } else {
            addTotal(creditSpan);
        }
        description.value = '';
        type.value = '';
        amount.value = '';
    }
    evt.preventDefault();
});

document.querySelector('.transactions').addEventListener('click', function(evt){
    if(evt.target = document.querySelectorAll('i.delete')[transCount]){
        function subtractTotal(typeSpan){
            var total = Number(typeSpan.childNodes[0].data.substring(1, typeSpan.childNodes[0].data.length) - Number(evt.target.parentElement.parentElement.dataset.amount));
            typeSpan.childNodes[0].data = '$' + moneyAmount(total);
            transCount = transCount - 1;
        }
        if (window.confirm("Are you sure you want to delete this transaction?")) { 
        var type = evt.target.parentElement.previousSibling.previousSibling.textContent;
        if(type == 'debit'){
            subtractTotal(debitSpan);
        } else {
            subtractTotal(creditSpan);
        }

        evt.target.parentElement.parentElement.remove();
      }
    }
});