// $(".carousel").swipe({

//     swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

//       if (direction == 'left') $(this).carousel('next');
//       if (direction == 'right') $(this).carousel('prev');

//     },
//     allowPageScroll:"vertical"

//   });
// let current = 1,
// playPauseBool = true,
// interval;

// const changeSlides = () =>{
//     const slideList = document.querySelectorAll(".slide");

//     const slides = Array.from(slideList);

//     if(current>slides.length){
//         current = 1;
//     }
//     else if(current === 0){
//         current = slides.length;
//     }

//     slides.forEach(slide=>{
//         if(slide.classList[1].split('-')[1]*1===current){
//             slide.style.cssText = 'Visibility: visible; opacity:1';
//         }
//         else{
//             slide.style.cssText = 'Visibility: hidden; opacity:0';
//         }
//     });
// };

// // const arrowsVisibility = () =>{
// //     const arrows = document.querySelectorAll('.control');
// //     Array.from(arrows).forEach(arrow=>{
// //         if(!playPauseBool){
// //             arrow.classList.add('.arrows-visibility')
// //         }else{
// //             arrow.classList.remove('.arrows-visibility')
// //         }
// //     });
// // };

// // const changePlayPause = () =>{
// //     const icon = document.querySelector('.play-pause i');
// //     const cls = icon.classList[1];

// //     if(cls === 'fa-play'){
// //        icon.classList.remove('fa-play');
// //        icon.classList.add('fa-pause');
// //     }
// //     else{
// //         icon.classList.remove('fa-pause');
// //        icon.classList.add('fa-play');
// //     }
// // };

// const playPause = () =>{
//     if(playPauseBool){
//         interval = setInterval(()=>{
//             current++;
//             changeSlides();
//         }, 3500);
//         playPauseBool = false;
//     }
//     else{
//         clearInterval(interval);
//         playPauseBool = true;
//     }
//     // changePlayPause();
//     // arrowsVisibility();
// };

// document.querySelector('.hover-pause').addEventListener('mouseover', ()=>{
//     playPause();
// });
// document.querySelector('.hover-pause').addEventListener('mouseout', ()=>{
//     playPause();
// });

// document.querySelector('.left-arrow').addEventListener('click', ()=>{
//     if(!playPauseBool){
//         playPause();
//     }

//     current--;
//     changeSlides();
// });
// document.querySelector('.right-arrow').addEventListener('click', ()=>{
//     if(!playPauseBool){
//         playPause();
//     }

//     current++;
//     changeSlides();
// });

// changeSlides();
// playPause();
