

// -------- Header Area --------
const dropdownLink = document.getElementById("dropdown-link")
const dropdownMenu = document.getElementById("dropdown-menu")
const toggle = document.getElementById('toggle')
const lines = document.querySelectorAll('.toggle div')
const navbar = document.querySelector('nav')

// --------Dropdown link event
dropdownLink.addEventListener("click", () => {
    dropdownMenu.classList.toggle("d-block")
    setTimeout(() => {
        dropdownMenu.classList.toggle("opacity-one")
    }, 100);
})
// --------End Dropdown link event

// --------Burger event
toggle.addEventListener('click', () => {
    toggle.classList.toggle('toggle-active')
    navbar.classList.toggle('active')
})
// --------End Burger event

// --------Document scroll
const header = document.querySelector('.header-area')
const logo1 = document.getElementById("logo-putih")
const logo2 = document.getElementById("logo-hitam")
const navLinks = document.querySelectorAll(".nav-link")

window.onscroll = function () {
    if (document.body.scrollTop >= 200 || document.documentElement.scrollTop >= 200) {
        header.classList.add("bg-white")
        logo1.classList.add("d-none")
        logo2.classList.remove("d-none")
        toggle.classList.add("border-dark")

        navLinks.forEach(navLink => {
            navLink.classList.add("text-dark")
        });

        lines.forEach(line => {
            line.classList.add("bg-dark")
        });
    } else {
        logo1.classList.remove("d-none")
        logo2.classList.add("d-none")
        header.classList.remove("bg-white")
        toggle.classList.remove("border-dark")

        navLinks.forEach(navLink => {
            navLink.classList.remove("text-dark")
        });

        lines.forEach(line => {
            line.classList.remove("bg-dark")
        });
    }
};
// --------End Document scroll

// --------Detect window size
let winSize = () => {
    var win = window,
        doc = document,
        docElem = doc.documentElement,
        body = doc.getElementsByTagName('body')[0],
        x = win.innerWidth || docElem.clientWidth || body.clientWidth

    return x
}

let topNavbar = () => {
    if (winSize() < 770) {
        navbar.style.top = header.offsetHeight + "px"
    }
}

// console.log(winSize());
// -------- End Header Area --------

// -------- Welcome Area --------
const welcome = document.getElementById("welcome")
const sdcards = document.querySelector(".sdcards-container")
const power = document.querySelector(".power-section")

if (typeof (sdcards) != 'undefined' && sdcards != null) {
    let topSDCard = () => {
        if (winSize() < 770) {
            sdcards.style.top = welcome.offsetHeight - 100 + "px"
        } else {
            sdcards.style.top = welcome.offsetHeight - 150 + "px"
        }
    }
    window.addEventListener("resize", () => {
        topSDCard()
    })
    topSDCard()
} else {
    power.style.marginTop = "0px"
}


// -------- End Welcome Area --------


const faqs = document.getElementsByClassName("faq")

for (let i = 0; i < faqs.length; i++) {
    const faq = faqs.item(i);
    faq.addEventListener("click", () => {
        for (let j = 0; j < faqs.length; j++) {
            const faqItem = faqs.item(j);
            if (j != i) {
                faqItem.classList.remove("collapse")
            }
        }
        faq.classList.toggle("collapse")
    })
}

window.addEventListener("resize", () => {
    topNavbar()
})
topNavbar()