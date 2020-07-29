

// dept_manager_data.addEventListener('mouseenter', (event)=>{
//     let xPosition = event.pageX
//     let yPosition = event.pageY
//     console.log(`${xPosition},${yPosition}`)
// })

// document.addEventListener("DOMContentLoaded", () => {
//     const dept_manager_data = document.getElementById('dept_manager_data')
//     dept_manager_data.addEventListener('mouseover', (event)=>{
//         var xPosition = event.pageX
//         var yPosition = event.pageY
//         console.log(event.target.innerHTML)
//         console.log(`${xPosition},${yPosition}`)
//     })
//     dept_manager_data.addEventListener('mouseout', (event)=>{
//         var xPosition = event.pageX
//         var yPosition = event.pageY
//         console.log(`${xPosition},${yPosition}`)
//     })
// });

const showInfoBox=(event)=>{

    const PopBoxID = event.target.children[0].innerHTML
    const PopBox = document.getElementById(PopBoxID)
    PopBox.className = 'Pop DisplayBlock'
}

const hideInfoBox=(event)=>{
    const PopBoxID = event.target.children[0].innerHTML
    const PopBox = document.getElementById(PopBoxID)
    PopBox.className = 'Pop DisplayNone'

}
