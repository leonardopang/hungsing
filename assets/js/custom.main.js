const depoimento_rotativo = new SiemaWithDots ({
    selector: '.depoimento_carrousel',
    duration: 250,
    threshold: 0,
    onInit: function(){
        this.addDots();
        this.updateDots();
    },
    onChange: function(){
        this.updateDots()
    },
});
setInterval(() => depoimento_rotativo.next(), 10000);

