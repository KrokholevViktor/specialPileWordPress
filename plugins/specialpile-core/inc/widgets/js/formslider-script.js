(function($){
    $(window).on("elementor/frontend/init",function(){
        elementorFrontend.hooks.addAction("frontend/element_ready/specialpile_slider.default",function($scope,$){
            let formSliderState = {};
            formSlider('.form-slider__navigation_prev .button_black', '.form-slider__navigation_next .button_black', '.form-slider__item', '.form-slider__wrapper', '.form-slider__inner');
            changeFormSliderSate(formSliderState);
            forms(formSliderState);

            function  formSlider(prevBtn, nextBtn, slidesItems, sliderWrapper, sliderInner) {
                const slides = document.querySelectorAll(slidesItems),
                prev = document.querySelector(prevBtn),
                next = document.querySelector(nextBtn),
                navigationNext = document.querySelector('.form-slider__navigation_next'),
                total = document.querySelector('#total'),
                current = document.querySelector('#current'),
                counter = document.querySelector('.form-slider__counter'),
                slidesWrapper = document.querySelector(sliderWrapper),
                slidesInner = document.querySelector(sliderInner),
                // width = window.getComputedStyle(slidesWrapper).width,
                titles = document.querySelectorAll('.form-slider__title'),
                buttonForm = document.querySelector('.form-slider__navigation_btn-form');
        
                let width = window.getComputedStyle(slidesWrapper).width;
        
            // moveSlide('.form-slider__inner');
        
        
            window.addEventListener('resize', () => {
                width = window.getComputedStyle(slidesWrapper).width
            });
        
            let slideIndex = 1;
            let offset = 0;
            let slideCounter = 0;
        
            if (slides.length < 10) {
                total.textContent = `0${slides.length - 1}`;
                current.textContent = `0${slideIndex}`;
            } else {
                total.textContent = slides.length - 1;
                current.textContent = slideIndex;
            };
        
            function setSlideWidth() {
                // slidesInner.style.width = `calc((100 * ${slides.length}%) + (10 * ${slides.length - 1}px))`;
                slidesInner.style.width = `calc(100 * ${slides.length}%)`;
                slides.forEach(slide => {
                    slide.style.width = width;
                });
            }
            setSlideWidth();
        
            window.addEventListener('resize', () => {
                
                setSlideWidth();
                offset = +width.slice(0, width.length - 2) * (slideIndex - 1);
                slidesInner.style.transition = `0s all`;
                slidesInner.style.transform = `translateX(-${offset}px)`;
        
            });
        
            hideElements();
            showTitle();
            hidePrev();
            next.disabled = true;
            // setTimeout(() => {
            //     next.click();
            //     prev.click();
            // }, 10);
        
            function showTitle() {
                titles.forEach(title => title.style.display = 'none')
                titles[slideIndex - 1].style.display = '';
            };
        
            next.addEventListener('click', () => {
                slidesInner.style.transition = `0.5s all`;
                if (offset == +width.slice(0, width.length - 2) * (slides.length - 1)) {
                    offset = 0;
                } else {
                    // offset += +width.slice(0, width.length - 2) + 10;
                    offset += +width.slice(0, width.length - 2);
                }
        
                slidesInner.style.transform = `translateX(-${offset}px)`;
        
                if (slideIndex == slides.length) {
                    slideIndex = 1;
                } else {
                    slideIndex++
                }
        
                if (slides.length < 10) {
                    current.textContent = `0${slideIndex}`;
                } else {
                    current.textContent = slideIndex;
                }
                ////отключил для тестов слайдера disabled
                next.disabled = true; 
                ////отключил для тестов слайдера disabled
                hideElements();
                showTitle();
                hidePrev();
                slideCounter++
                checkSelecteditems(slideCounter);
            });
        
            prev.addEventListener('click', () => {
                if (offset == 0) {
                    offset = +width.slice(0, width.length - 2) * (slides.length - 1);
                } else {
                    // offset -= +width.slice(0, width.length - 2) + 10;
                    offset -= +width.slice(0, width.length - 2);
                }
        
                slidesInner.style.transform = `translateX(-${offset}px)`;
        
                if (slideIndex == 1) {
                    slideIndex = slides.length;
                } else {
                    slideIndex--
                }
        
                if (slides.length < 10) {
                    current.textContent = `0${slideIndex}`;
                } else {
                    current.textContent = slideIndex;
                }
                hideElements();
                showTitle();
                hidePrev();
                slideCounter--
                checkSelecteditems(slideCounter);
            });
        
            function hidePrev() {
                if ((slideIndex - 1) == 0) {
                    prev.style.visibility = 'hidden';
                } else {
                    prev.style.visibility = '';
                }
            };
        
            function hideElements() {
                if (slideIndex == slides.length) {
                    counter.style.visibility = 'hidden';
                    navigationNext.style.display = 'none';
                    buttonForm.style.display = '';
                } else {
                    counter.style.visibility = '';
                    navigationNext.style.display = '';
                    buttonForm.style.display = 'none';
                }
            };
        
            const slideSelect = () => {    
        
                slides.forEach(slide => {
                    const images = slide.querySelectorAll('.form-slider__img'),
                        cardAskSelects = slide.querySelectorAll('.form-slider__item__card-form_select');
        
                    images.forEach(element => {
        
                        element.addEventListener('click', () => {
                            images.forEach(element => {
                                element.children[1].classList.remove('img-selected');
                            });
                            element.children[1].classList.add('img-selected');
                            next.disabled = false;
                            if (!element.children[1].classList.contains('img-selected')) {
                                element.children[1].previousElementSibling.style.cssText = "border-bottom: 1px solid $black-color;"
                            } else {
                                images.forEach(element => {
                                    element.children[1].previousElementSibling.style.cssText = "border-bottom: 1px solid $black-color;"
                                });
                                element.children[1].previousElementSibling.style.cssText = "background-color: transparent; border-bottom: none; color: white; ";
                            }
                        });
                    });
        
                    cardAskSelects.forEach(select => {
                        select.addEventListener('click', () => {
                            next.disabled = false;
                            cardAskSelects.forEach(select => {
                                select.classList.remove('ask-selected');
                            });
                            select.classList.add('ask-selected');
        
                            
                        });
                    });
        
                    //////////////////////////////////////// заменяет чёрточку в counter у form-slider
                    const counterDivider = document.querySelector('.form-slider__counter_divider');
        
                    if (window.innerWidth < 576 || window.screen.availWidth < 576) {
                    
                        counterDivider.textContent = '';
                        images.forEach(element => {
                            element.children[1].style.display = 'none'
                        });
                    };
        
                    window.addEventListener('resize', () => {
                        if (window.innerWidth < 576 || window.screen.availWidth < 576) {
                            counterDivider.textContent = '';
                            images.forEach(element => {
                                element.children[1].style.display = 'none'
                            });
                        } else {
                            counterDivider.textContent = '/';
                            images.forEach(element => {
                                element.children[1].style.display = ''
                            });
                        }
                    })
                    /////////////////////////////////////////////
                });
            };
            slideSelect();
        
        
            // проверяет карточки в слайдере на наличие класса и включает или оключает кнопку next 
            function checkSelecteditems(i) {
                let slidesItems = slides[i].querySelectorAll('.form-slider__img');
                let askitems = slides[i].querySelectorAll('.form-slider__item__card-form_select');
                function chek(typeSlide) {
                        for (i = 0; i < typeSlide.length; i++) {
                            try {
                                if (!(typeSlide[i].children[1].classList.contains('img-selected'))) {
                                    // next.disabled = true;
                                    ////отключил для тестов слайдера disabled
                                } else {
                                    next.disabled = false;
                                    return
                                }
                            } catch (error) {
                                if (!(typeSlide[i].classList.contains('ask-selected'))) {
                                    next.disabled = true;
                                    ////отключил для тестов слайдера disabled
                                } else {
                                    next.disabled = false;
                                    return
                                }
                            }
                        };
                };
                chek(slidesItems);
                chek(askitems);
            };
        }
        /// slider end

        // form start
        function forms(state) {
            const formWrapper = document.querySelectorAll('form'),
                  inputs = document.querySelectorAll('input'),
                  phoneInputs = document.querySelectorAll('input[name="phone"]'),
                  upload = document.querySelectorAll('[name="file"]');
        
            phoneInputs.forEach(input => {
                input.addEventListener('input', () => {
                    input.value = input.value.replace(/\D/, '')
                });
            });
        
            const message = {
                loading: 'Загрузка...',
                success: 'Заявка успешно отправленна!',
                failure: 'Что-то пошло не так...'
            };
        
            const postData = async (url, data) => {
                document.querySelector('.status').textContent = message.loading;
                let res = await fetch(url, {
                    method: "POST",
                    body: data
                });
                return await res.text();
            };
        
            const clearInputs = () => {
                inputs.forEach(input => {
                    input.value = '';
                });
                upload.forEach(item => {
                    item.previousElementSibling.textContent = 'Прикрепить файл';
                });
            };
        
            upload.forEach(item => {
                item.addEventListener('input', () => {
                    let dots;
                    const arr = item.files[0].name.split('.'); 
                    arr[0].length > 15 ? dots = "..." : dots = '.';
                    const name = arr[0].substring(0, 15) + dots + arr[1];
                    item.previousElementSibling.textContent = name;
                })
            })
        
        
        
        
        
        
            // const buttonForm = document.querySelector('.form-slider__navigation_btn-form button');
            // buttonForm.addEventListener('click', () => {
            //     validateForm();
            // })
        
            // function validateForm() {
                
            //     const errorMessage = document.getElementById('error-message-empty');
            //     inputs.forEach(input => {
            //         console.log(input.value);
            //         if (input.value.trim() === '') {
        
            //             errorMessage.style.display = 'block';
            //             return false; // Отменяем отправку формы, если поле пустое
            //           } else {
            //             errorMessage.style.display = 'none';
            //             return true; // Разрешаем отправку формы, если поле заполнено
            //           }
            //     })
            //   }
            
        
        
        
            function validation(form, inputFocus, event) {
        
                let result = true;
                let emailFlag = false;
                const minLength = 18;
        
                const tooltips = document.querySelectorAll('.tooltip');
        
                function removeError(input) {
                    const parent = input.parentNode;
        
                    if(parent.classList.contains('form-main__item-error')){
                        parent.querySelector('.error-div').remove();
                        parent.classList.remove('form-main__item-error')
                        input.classList.remove('error-focus-border');
                        tooltips.forEach(tooltip => {
                            if (parent.classList.contains('form-main__item-error') && parent.querySelector('.tooltip')) {
                                tooltip.classList.remove('tooltip-error');
                            }
                        })
                    }
                    
                }
        
                function createError(input, text) {
                    const parent = input.parentNode;
                    const errorDiv = document.createElement('div');
                    errorDiv.classList.add('error-div');
                    errorDiv.textContent = text;
                    parent.append(errorDiv);
                    parent.classList.add('form-main__item-error');
                    input.classList.add('error-focus-border');
                    tooltips.forEach(tooltip => {
                        if (parent.classList.contains('form-main__item-error') && parent.querySelector('.tooltip')) {
                            tooltip.classList.add('tooltip-error');
                        }
                    })
                }
        
        
                
        
                function createErrorMessage(inputFocusCurrent) {
                    if(inputFocusCurrent.value == "" && inputFocusCurrent.getAttribute('name') === 'phone') {
                        createError(inputFocusCurrent, 'Поле не заполнено');
                        result = false;
                    } else if (inputFocusCurrent.value == "" && inputFocusCurrent.getAttribute('name') === 'email') {
                        createError(inputFocusCurrent, 'Поле не заполнено');
                        result = false;
                    } else if(inputFocusCurrent.value.length < minLength && inputFocusCurrent.getAttribute('name') === 'phone') {
                        createError(inputFocusCurrent, 'Введите номер полностью');
                        result = false;
                    } else if ((emailFlag == false) && inputFocusCurrent.getAttribute('name') === 'email') {
                        createError(inputFocusCurrent, 'Неверный адрес электронной почты.');
                        result = false;
                    } else if (!inputFocusCurrent.checked && inputFocusCurrent.getAttribute('name') === 'checkbox' && event.type == 'submit') {
                        createError(inputFocusCurrent, 'Подтвердите свое согласие');
                        result = false;
                    }
                }
        
                
        
                function isEmailValid(email) {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return emailPattern.test(email);
                }
        
                if (inputFocus) {
                    const allInputs =  form.querySelectorAll('.input--required')
                    for (const input of allInputs) {
                        removeError(inputFocus);
                        if (isEmailValid(input.value)) {
                            emailFlag = true
                        }
                    }
                    createErrorMessage(inputFocus)
                } else {
                    const allInputs =  form.querySelectorAll('.input--required')
                    for (const input of allInputs) {
                        removeError(input);
                        // let emailFlag = false;
        
                        
        
                        if (isEmailValid(input.value)) {
                            emailFlag = true
                        }
        
                        if(input.value == "" && input.getAttribute('name') === 'phone') {
                            createError(input, 'Поле не заполнено');
                            result = false;
                        } else if (input.value == "" && input.getAttribute('name') === 'email') {
                            createError(input, 'Поле не заполнено');
                            result = false;
                        } else if(input.value.length < minLength && input.getAttribute('name') === 'phone') {
                            createError(input, 'Введите номер полностью');
                            result = false;
                        } else if ((emailFlag == false) && input.getAttribute('name') === 'email') {
                            createError(input, 'Неверный адрес электронной почты.');
                            result = false;
                        } else if (!input.checked && input.getAttribute('name') === 'checkbox' && event.type == 'submit') {
                            createError(input, 'Подтвердите свое согласие');
                            result = false;
                        }
                    }
                }
        
                
        
                return result;
            }
        
        
        
        
        
            formWrapper.forEach(item => {
                const allRequireInputs =  item.querySelectorAll('.input--required');
                allRequireInputs.forEach(input => {
        
                    input.addEventListener('change', (event) => {
                        validation(item, input, event);
                        input.addEventListener('input', (event) => {
                            validation(item, input, event);
                        });
                    });
                })
        
        
                item.addEventListener('submit', (event) => {
                    event.preventDefault();
        
                    
        
                    if (validation(item, false, event)) {
        
        
        
                        let statusMessage = document.createElement('div');
                        statusMessage.classList.add('status');
                        item.appendChild(statusMessage);
        
                        const formData = new FormData(item);
        
                        if (item.getAttribute('data-calc')  === "end") {
                            for (let key in state) {
                                formData.append(key, state[key]);
                            }
                        }
        
                        postData('server.php', formData)
                            .then(res => {
                                console.log(res);
                                statusMessage.textContent = message.success;
                            })
                            .catch(() => {
                                statusMessage.textContent = message.failure;
                            })
                            .finally(() => {
                                clearInputs();
                                setTimeout(() => {
                                    statusMessage.remove();
                                }, 5000);
                            });
        
                            const checkboxs = document.querySelectorAll('input[name="checkbox"]');
                            checkboxs.forEach(checkbox => {
                                checkbox.checked = false;
                            })
                            
                    }
                });
            });
        };
        ///// form end

        // changeFormSlider start
        function changeFormSliderSate (state) {
    
            const buldingType = document.querySelectorAll('.item-1 .form-slider__item__card'),
                  floorsNumber = document.querySelectorAll('.item-2 .form-slider__item__card'),
                  material = document.querySelectorAll('.item-3 .form-slider__item__card'),
                  soiltype = document.querySelectorAll('.item-4 .form-slider__item__card'),
                  planSelect = document.querySelectorAll('.item-5 .form-slider__item__card-form_select');
                  
            function bindActionToElems (elem, prop) {
                elem.forEach(item => {
                    item.addEventListener('click', () => {
                        if (item.firstElementChild === null) {
                            state[prop] = item.textContent.replace(/\s+/g,' ');
                        } else {
                            state[prop] = item.firstElementChild.textContent.replace(/\s+/g,' ');
                        }
                    })
                });
            };
        
            bindActionToElems(buldingType, 'buldingType');
            bindActionToElems(floorsNumber, 'floorsNumber');
            bindActionToElems(material, 'material');
            bindActionToElems(soiltype, 'soiltype');
            bindActionToElems(planSelect, 'planSelect');
        };
        // changeFormSlider end

        });
    });
})(jQuery);


