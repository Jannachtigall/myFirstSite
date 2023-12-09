var specialties = {
    "appmath":{
        "name": "Прикладная математика",
        "points": 245,
        "institute": "Институт вычислительной математики и информационных технологий",
        "description": "Направление, связанное с разработкой и применением математических методов для решения практических научных, инженерных, управленческих и экономических задач на базе современных информационных технологий.",
        "lastsub": ["информатика", "физика", "иностранный язык"]
    },
    "comps":{
        "name": "Информатика и вычислительная техника",
        "points": 247,
        "institute": "Институт вычислительной математики и информационных технологий",
        "description": "В рамках направления «Информатика и вычислительная техника» предполагается подготовка профессионалов в области исследования и проектирования вычислительных устройств, систем и компьютерных сетей нового поколения, в том числе вычислительных комплексов и коммуникационных систем, распределенных систем сбора и обработки информации, методов и средств управления ИТ-услугами и сервисами.",
        "lastsub": ["информатика", "физика", "иностранный язык"]
    },
    "appinf":{
        "name": "Прикладная информатика",
        "points": 251,
        "institute": "Институт вычислительной математики и информационных технологий",
        "description": "Студенты получают теоретическую и практическую подготовку в сфере технологий обработки данных, проектирования, разработки и эксплуатации информационных систем и хранилищ данных, обеспечивающих деятельность и бизнес-процессы различных организаций, в том числе гуманитарной сферы.",
        "lastsub": ["информатика", "физика", "иностранный язык"]
    },
    "funduk":{
        "name": "Фундаментальная информатика и информационные технологии",
        "points": 265,
        "institute": "Институт вычислительной математики и информационных технологий",
        "description": "Фундаментальная информатика и информационные технологии — направление подготовки, дающее будущим специалистам знания и навыки во многих областях: математические основы информатики, общетеоретическая информатика, практическое использование инновационных информационно-коммуникационных технологий.",
        "lastsub": ["информатика", "физика", "иностранный язык"]
    },
    "business":{
        "name": "Бизнесс-информатика",
        "points": 271,
        "institute": "Институт вычислительной математики и информационных технологий",
        "description": "Это новое направление подготовки специалистов в области проектирования, разработки и применения информационных и коммуникационных систем в бизнесе.",
        "lastsub": ["информатика", "физика", "иностранный язык"]
    },
    "itis": {
        "name": "Программная инженерия",
        "points": 277,
        "institute": "Институт информационных технологий и интеллектуальных систем",
        "description": "Это направление подготовки разработчиков программного обеспечения и программных систем. Отрасль охватывает системное и прикладное программирование, занимается теориями, методами и инструментами для профессиональной разработки ПО.",
        "lastsub": ["информатика"]
    },
    "mechmath": {
        "name": "Математика и компьютерные науки",
        "points": 290,
        "institute": "Институт математики и механики",
        "description": "С начала 2010-х годов профессия «учёного по данным» считается одной из самых привлекательных, высокооплачиваемых и перспективных. Интерес к ней тесно связан с концепцией «больших данных». Но что же стоит за этими названиями? 1. Математика: анализ, вероятность, статистика, оптимизация и т. д. 2. Computer Science, или компьютерные науки, — это наука о методах и процессах сбора, хранения, обработки, передачи, анализа и оценки информации с использованием компьютерных технологий.",
        "lastsub": ["информатика", "физика"]
    }
}

function formula(){
    var rus = parseInt(document.getElementById("russian_lang").value)
        math = parseInt(document.getElementById("math").value)
        inf = parseInt(document.getElementById("inf_tech").value)
        eng = parseInt(document.getElementById("foreign_lang").value)
        phis = parseInt(document.getElementById("phys").value)
        dopballs = 0;
    var result = ""
        info = ""
        
    if (document.getElementById("gto").checked) dopballs += 2
    if (document.getElementById("certificate").checked) dopballs += 10
    if (document.getElementById("sport_master").checked) dopballs += 3

    var summs = [0, 0, 0]
    if (inf > 0) {
        summs[0] = rus + math + inf + dopballs
        info += "Ваши баллы по набору предметов русский язык/математика/информатика: " + summs[0] + "<br>"
    }
    if (eng > 0) {
        summs[1] = rus + math + eng + dopballs
        info += "Ваши баллы по набору предметов русский язык/математика/иностранный язык: " + summs[1] + "<br>"
    }
    if (phis > 0) {
        summs[2] = rus + math + phis + dopballs
        info += "Ваши баллы по набору предметов русский язык/математика/физика: " + summs[2] + "<br>"
    }
    info += "Дополнительные баллы: " + dopballs
    localStorage.setItem("info", info)
    
    // document.location = 'ResultPage.html'
    if (rus >= 40 && math >= 27 && (inf >= 36 || phis >= 36 || eng >= 36)){
        for (var key in specialties){
            var finalsum = Math.max(summs[0], Math.max(summs[1], summs[2]));
            if (specialties[key].lastsub.length == 1 && summs[0] == 0) continue
            if (specialties[key].lastsub.length == 2 && summs[0] == 0 && summs[2] == 0) {
                continue
            }
            else if (specialties[key].lastsub.length == 1) finalsum = summs[0]
            var commercial = "Основа обучения: ";
            if (finalsum < specialties[key].points) commercial += 'Контракт'
            else commercial += '<b>Бюджет</b>'
            result += `<div class="col-lg-12 mt-2">
            <div class="card p-2">
              <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">${specialties[key].name}</h5>
                  <small>${specialties[key].points} баллов</small>
                </div>
                <div class="d-flex w-100 justify-content-between">
                  <p class="mb-1">${specialties[key].institute}</p>
                  <small>${commercial}</small>
                </div>
                <small>${specialties[key].description}</small>
              </a>
            </div>
          </div>`
        }
        localStorage.setItem("result", result)
    } else {
        localStorage.setItem("result", "Увы, у вас слишком мало баллов! Наш университет вам явно не подходит.")
    }
    window.location = "ResultPage.html"
}

function closeModal() {
    document.getElementById("no").hidden = true;
}	