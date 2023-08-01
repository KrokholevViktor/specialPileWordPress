(function($){
    $(window).on("elementor/frontend/init",function(){
        elementorFrontend.hooks.addAction("frontend/element_ready/specialpile_questions.default",function($scope,$){

            accordionFaq('.questions__accordion__item', '.questions__accordion__descr');

            function accordionFaq (triggersSelector, descrSelector) {
                const triggers = document.querySelectorAll(triggersSelector),
                      blocks = document.querySelectorAll(descrSelector);
            
            
                triggers.forEach(trigger => {
                    trigger.addEventListener('click', function() {
                        if (!this.classList.contains('questions__accordion__item_active')) {
                            this.classList.add('questions__accordion__item_active');
                            this.lastElementChild.classList.remove('fadeOut');
                            this.lastElementChild.classList.add('fadeIn');
                            console.log(this.lastElementChild);
                        } else {
                            this.lastElementChild.classList.remove('fadeIn');
                            this.lastElementChild.classList.add('fadeOut');
                            setTimeout(() => {
                                this.classList.remove('questions__accordion__item_active');
                            }, 250);
                            console.log(this.lastElementChild);
                        }
                    })
                })
            
            };
        });
    });
})(jQuery);