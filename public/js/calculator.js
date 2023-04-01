new Vue({
    el: '#app',
    data: {
        expression: '',
        result: '',
        buttons: [
            { type: 'function', label: 'sin', value: 'sin(' },
            { type: 'function', label: 'cos', value: 'cos(' },
            { type: 'function', label: 'tan', value: 'tan(' },
            { type: 'function', label: 'asin', value: 'asin(' },
            { type: 'function', label: 'acos', value: 'acos(' },
            { type: 'function', label: 'atan', value: 'atan(' },
            { type: 'function', label: 'log', value: 'log(' },
            { type: 'function', label: 'ln', value: 'log(' },
            { type: 'function', label: 'sqrt', value: 'sqrt(' },
            { type: 'function', label: '(', value: '(' },
            { type: 'function', label: ')', value: ')' },
            { type: 'operator', label: '/', value: '/' },
            { type: 'operator', label: 'x', value: '*' },
            { type: 'operator', label: '+', value: '+' },
            { type: 'operator', label: '-', value: '-' }, 
            { type: 'digit', label: '7', value: '7' },
            { type: 'digit', label: '8', value: '8' },
            { type: 'digit', label: '9', value: '9' },
            { type: 'delete', label: 'DEL', value: 'DEL' },
            { type: 'clear', label: 'CE', value: 'CE' },
            { type: 'digit', label: '4', value: '4' },
            { type: 'digit', label: '5', value: '5' },
            { type: 'digit', label: '6', value: '6' },
            { type: 'operator', label: '^', value: '^' },
            { type: 'operator', label: '%', value: '%' },
            { type: 'digit', label: '1', value: '1' },
            { type: 'digit', label: '2', value: '2' },
            { type: 'digit', label: '3', value: '3' },
            
            { type: 'digit', label: '0', value: '0' },
            { type: 'digit', label: '.', value: '.' },        
        ],
    },
    methods: {
        appendToExpression(value) {
            if (value === 'CE') {
                this.expression = '';
            } else if (value === 'DEL') {
                this.expression = this.expression.slice(0, -1);
            } else {
                this.expression += value;
            }
        },
        calculate() {
            //To use controller for the calculation
            /**axios.post('/', {
                expression: this.expression
            })
            .then(response => {
                this.expression = response.data.result;
            })
            .catch(error => {
                this.expression = 0;
            });
            **/
            //To use mathjs library for the calculation
            try {
                this.result = math.evaluate(this.expression);
                this.expression = this.result;
            } catch (e) {
                this.expression = 0;
            }
        },
    },
});