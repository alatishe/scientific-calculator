<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scientific Calculator</title>
    <link href="{{ asset('css/app.css?v=13') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    
</head>
<body>
<div id="app" class="calculator"> <span>Scientific Calculator</span>
    <div class="display">&nbsp;
        @{{ expression }}
    </div>
    <div v-for="(button, index) in buttons" v-if="index % 5 === 0" class="button-row">
        <button v-for="i in 5" :class="['button', buttons[index + i - 1].type]" @click="appendToExpression(buttons[index + i - 1].value)" v-html="buttons[index + i - 1].label" v-if="buttons[index + i - 1]"></button>
    </div>
    <div class="row">
        <button class="btn btn-primary btn-block calc" @click="calculate">=</button>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.2.0/math.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/calculator.js') }}"></script>
</body>
</html>
