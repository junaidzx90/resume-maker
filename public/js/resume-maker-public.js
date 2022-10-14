jQuery(document).ready(function ($) {
	class RM_Education{
		constructor(school = "", degree = "", startDate = "", endDate = "", city = "", desc = ""){
			this.id = new Date().getTime();
			this.school = school;
			this.degree = degree;
			this.startDate = startDate;
			this.endDate = endDate;
			this.city = city;
			this.desc = desc;
		}
	}
	class RM_Employment{
		constructor(jobTitle = "", employer = "", startDate = "", endDate = "", city = "", desc = ""){
			this.id = new Date().getTime();
			this.jobTitle = jobTitle;
			this.employer = employer;
			this.startDate = startDate;
			this.endDate = endDate;
			this.city = city;
			this.desc = desc;
		}
	}
	class RM_Skill{
		constructor(skill = "", level = ""){
			this.id = new Date().getTime();
			this.skill = skill;
			this.level = level;
		}
	}
	class RM_Language{
		constructor(language = "", level = ""){
			this.id = new Date().getTime();
			this.language = language;
			this.level = level;
		}
	}

	const rm = new Vue({
		el: "#resume-maker", 
		data: {
			personalInfo: {
				fname: "",
				lname: "",
				birthdate: "",
				email: "",
				phone: "",
				city: "",
				description: ""
			},
			educations: [],
			employments: [],
			skills: [],
			languages: []
		},
		methods: {
			add_list(type){
				$(".rm-section").siblings().find(".list-contents").addClass("dnone");

				switch (type) {
					case 'education':
						this.educations.push(new RM_Education());
						break;
					case 'employment':
						this.employments.push(new RM_Employment());
						break;
					case 'skill':
						this.skills.push(new RM_Skill());
						break;
					case 'language':
						this.languages.push(new RM_Language());
						break;
				}
				
			},
			delete_list(id, type){
				switch (type) {
					case 'education':
						this.educations = this.educations.filter( education =>{
							return education.id !== id;
						});
						break;
					case 'employment':
						this.employments = this.employments.filter( employer =>{
							return employer.id !== id;
						});
						break;
					case 'skill':
						this.skills = this.skills.filter( skill =>{
							return skill.id !== id;
						});
						break;
					case 'language':
						this.languages = this.languages.filter( language =>{
							return language.id !== id;
						});
						break;
				
					default:
						break;
				}
			}
		},
		updated: function(){
			// Input decorator
			$(".rm-section .rm-inp").each(function () {
				$(this).focus(function(){
					$(this).next(".input_decor").animate({
						opacity: "1",
						width: "100%"
					})
				});
				$(this).focusout(function(){
					$(this).next(".input_decor").animate({
						opacity: "0",
						width: "50%"
					})
				});
			});
		},
		created: function(){
			$("#resume-maker").removeClass("dnone");
		}
	});

	$(document).on("click", ".rm-list", function(){
		$(this).parents(".rm-section").siblings().find(".list-contents").addClass("dnone");
		$(this).parents(".innerForm").siblings().find(".list-contents").addClass("dnone");

		$(this).parent().find(".list-contents").toggleClass("dnone");
	});
	
	// Scale the resume
	let element3 = document.getElementById('rm-output');
	if(element3 === null){
		return;
	}
	let scaleVal = element3.clientHeight / 100 * 7;
	document.querySelector(".resume_container").style.transform = "scale("+scaleVal+"%)";

	$('#download-resume').on('click', function (e) {
		e.preventDefault();
		$(this).attr("disabled", "disabled");
		let page = document.querySelector(".resume_holder");
		let name = $(this).attr("data-name");

		var opt = {
			margin: 0,
			filename:     name+'.pdf',
			image: { 
				type: 'jpeg', 
				quality: 1
			},
			html2canvas:  { 
				scale: 2, 
				scrollY: 0, 
				scrollX: 0,
				letterRendering: true
			},
			jsPDF: { 
				orientation: 'p',
				unit: 'mm',
				format: "a4"
			},
			pagebreak: {mode: ['avoid-all', 'css', 'legacy']}
		};

		
		// New Promise-based usage:page_break
		let doc = html2pdf().set(opt).from(page).toPdf();
		doc.save()
		
		  
		$(this).removeAttr("disabled");
	});
});
