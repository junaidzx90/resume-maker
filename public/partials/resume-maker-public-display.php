<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Resume_Maker
 * @subpackage Resume_Maker/public/partials
 */
?>
<style>
    .elementor-element {
        width: 100% !important;
        max-width: 100% !important;
    }
</style>
<div id="resume-maker" class="dnone">
    <div class="rm-contents">
        <div class="rm-fields">
            <div class="rm-section">
                <h3><?php echo __("Personal Details", "resume-maker") ?></h3>

                <div class="rm-2-fields">
                    <div class="rm-field">
                        <label for="first-name"><?php echo __("First Name", "resume-maker") ?></label>
                        <input class="rm-inp" type="text" id="first-name" v-model="personalInfo.fname">
                        <div class="input_decor"></div>
                    </div>
                    <div class="rm-field">
                        <label for="last-name"><?php echo __("Family Name", "resume-maker") ?></label>
                        <input class="rm-inp" type="text" id="last-name" v-model="personalInfo.lname">
                        <div class="input_decor"></div>
                    </div>
                </div>
                <div class="rm-2-fields">
                    <div class="rm-field">
                        <label for="email"><?php echo __("Email", "resume-maker") ?></label>
                        <input class="rm-inp" type="email" id="email" v-model="personalInfo.email">
                        <div class="input_decor"></div>
                    </div>
                    <div class="rm-field">
                        <label for="phone"><?php echo __("Phone", "resume-maker") ?></label>
                        <input class="rm-inp" type="text" id="phone" v-model="personalInfo.phone">
                        <div class="input_decor"></div>
                    </div>
                </div>
                <div class="rm-2-fields">
                    <div class="rm-field">
                        <label for="city"><?php echo __("City", "resume-maker") ?></label>
                        <input class="rm-inp" type="text" id="city" v-model="personalInfo.city">
                        <div class="input_decor"></div>
                    </div>
                    <div class="rm-field">
                        <label for="city"><?php echo __("Birthday", "resume-maker") ?></label>
                        <input class="rm-inp" type="date" id="date" v-model="personalInfo.birthdate">
                        <div class="input_decor"></div>
                    </div>
                </div>

            </div>

            <div class="rm-section">
                <h3><?php echo __("Professional Summary", "resume-maker") ?></h3>
                <div class="summary-editor field_text flex1">
                    <textarea class="rm-inp" id="professional-summary" v-model="personalInfo.description"></textarea>
                    <div class="input_decor"></div>
                </div>
            </div>

            <div class="rm-section">
                <h3><?php echo __("Educations", "resume-maker") ?></h3>
                <div class="guide-info"><p><?php echo __("A varied education on your resume sums up the value that your learnings and background will bring to job.", "resume-maker") ?></p></div>
                <div class="educations">

                    <div v-for="(education, index) in educations" :key="index" class="innerForm">
                        <div class="rm-list">
                            <h3>{{education.school}}</h3>
                            <span class="collapse_icon"><svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M9.431 7.257l1.352-1.474 5.893 5.48a1 1 0 0 1 0 1.474l-5.893 5.45-1.352-1.475L14.521 12 9.43 7.257z"></path></svg></span>
                        </div>
                        
                        <div class="list-contents">
                            <div class="rm-2-fields">
                                <div class="rm-field">
                                    <label :for="'school-'+education.id"><?php echo __("School", "resume-maker") ?></label>
                                    <input class="rm-inp" type="text" :id="'school-'+education.id" v-model="education.school">
                                    <div class="input_decor"></div>
                                </div>
                                <div class="rm-field">
                                    <label :for="'degree-'+education.id"><?php echo __("Certificate", "resume-maker") ?></label>
                                    <input class="rm-inp" type="text" :id="'degree-'+education.id" v-model="education.degree">
                                    <div class="input_decor"></div>
                                </div>
                            </div>
                            <div class="rm-2-fields">
                                <div class="rm-field">
                                    <label><?php echo __("Start & End Date", "resume-maker") ?></label>
                                    <div class="dates">
                                        <input type="month" v-model="education.startDate" placeholder="MM/YYYY">
                                        <input type="month" v-model="education.endDate" placeholder="MM/YYYY">
                                    </div>
                                </div>
                                <div class="rm-field">
                                    <label :for="'edu-city-'+education.id"><?php echo __("City", "resume-maker") ?></label>
                                    <input class="rm-inp" type="text" :id="'edu-city-'+education.id" v-model="education.city">
                                    <div class="input_decor"></div>
                                </div>
                            </div>
                            <div class="edu-description field_text flex1">
                                <label :for="'desc-'+education.id"><?php echo __("Description", "resume-maker") ?></label>
                                <textarea class="rm-inp" :id="'desc-'+education.id" v-model="education.desc"></textarea>
                                <div class="input_decor"></div>
                            </div>
                        </div>

                        <span @click="delete_list(education.id, 'education')" class="delete-rm-list">
                            <svg width="20" height="20" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M14 6h3v2H3V6h3V3c0-.55228.44772-1 1-1h6c.5523 0 1 .44772 1 1v3zm-9 4h10v8H5v-8zm2 6h6v-4H7v4zm5-10V4H8v2h4z"></path></svg>
                        </span>
                    </div>

                    <div @click="add_list('education')" v-if="educations.length === 0" class="add-education">+ <?php echo __("Add education", "resume-maker") ?></div>
                    <div @click="add_list('education')" v-if="educations.length" class="add-education">+ <?php echo __("Add one more education", "resume-maker") ?></div>
                </div>
            </div>
            
            <div class="rm-section">
                <h3><?php echo __("Employment History", "resume-maker") ?></h3>
                <div class="guide-info"><p><?php echo __("Show your relevant experience (last 10 years). Use bullet points to note your achievements, if possible - use numbers/facts (Achieved X, measured by Y, by doing Z).", "resume-maker") ?></p></div>
                <div class="employments">

                    <div v-for="(employment, index) in employments" :key="index" class="innerForm">
                        <div class="rm-list">
                            <h3>{{employment.jobTitle}}</h3>
                            <span class="collapse_icon"><svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M9.431 7.257l1.352-1.474 5.893 5.48a1 1 0 0 1 0 1.474l-5.893 5.45-1.352-1.475L14.521 12 9.43 7.257z"></path></svg></span>
                        </div>

                        <div class="list-contents">
                            <div class="rm-2-fields">
                                <div class="rm-field">
                                    <label :for="'job-title-'+employment.id"><?php echo __("Job Title", "resume-maker") ?></label>
                                    <input class="rm-inp" type="text" :id="'job-title-'+employment.id" v-model="employment.jobTitle">
                                    <div class="input_decor"></div>
                                </div>
                                <div class="rm-field">
                                    <label :for="'employer-'+employment.id"><?php echo __("Employer", "resume-maker") ?></label>
                                    <input class="rm-inp" type="text" :id="'employer-'+employment.id" v-model="employment.employer">
                                    <div class="input_decor"></div>
                                </div>
                            </div>
                            <div class="rm-2-fields">
                                <div class="rm-field">
                                    <label><?php echo __("Start & End Date", "resume-maker") ?></label>
                                    <div class="dates">
                                        <input type="month" v-model="employment.startDate" placeholder="MM/YYYY">
                                        <input type="month" v-model="employment.endDate" placeholder="MM/YYYY">
                                    </div>
                                </div>
                                <div class="rm-field">
                                    <label :for="'edu-city-'+employment.id"><?php echo __("City", "resume-maker") ?></label>
                                    <input class="rm-inp" type="text" :id="'edu-city-'+employment.id" v-model="employment.city">
                                    <div class="input_decor"></div>
                                </div>
                            </div>
                            <div class="edu-description field_text flex1">
                                <label :for="'desc-'+employment.id"><?php echo __("Description", "resume-maker") ?></label>
                                <textarea class="rm-inp" :id="'desc-'+employment.id" v-model="employment.desc"></textarea>
                                <div class="input_decor"></div>
                            </div>
                        </div>

                        <span @click="delete_list(employment.id, 'employment')" class="delete-rm-list">
                            <svg width="20" height="20" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M14 6h3v2H3V6h3V3c0-.55228.44772-1 1-1h6c.5523 0 1 .44772 1 1v3zm-9 4h10v8H5v-8zm2 6h6v-4H7v4zm5-10V4H8v2h4z"></path></svg>
                        </span>
                    </div>

                    <div @click="add_list('employment')" v-if="employments.length === 0" class="add-employment">+ <?php echo __("Add employment", "resume-maker") ?></div>
                    <div @click="add_list('employment')" v-if="employments.length" class="add-employment">+ <?php echo __("Add one more employment", "resume-maker") ?></div>
                </div>
            </div>

            <div class="rm-section">
                <h3><?php echo __("Skill's", "resume-maker") ?></h3>
                <div class="guide-info"><p><?php echo __("Choose 5 of the most important skills to show your talents! Make sure they match the keywords of the job listing if applying via an online system.", "resume-maker") ?></p></div>
                <div class="skills">

                    <div v-for="(skill, index) in skills" :key="index" class="innerForm">
                        <div class="rm-list">
                            <h3>{{skill.skill}}</h3>
                            <span class="collapse_icon"><svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M9.431 7.257l1.352-1.474 5.893 5.48a1 1 0 0 1 0 1.474l-5.893 5.45-1.352-1.475L14.521 12 9.43 7.257z"></path></svg></span>
                        </div>
                        
                        <div class="list-contents">
                            <div class="rm-2-fields">
                                <div class="rm-field">
                                    <label :for="'new-skill-'+skill.id"><?php echo __("Skill", "resume-maker") ?></label>
                                    <input class="rm-inp" type="text" :id="'new-skill-'+skill.id" v-model="skill.skill">
                                    <div class="input_decor"></div>
                                </div>
                                <div class="rm-field">
                                    <label :for="'skill-level-'+skill.id"><?php echo __("Level", "resume-maker") ?></label>
                                    <select v-model="skill.level" class="rm-inp" :id="'skill-level-'+skill.id">
                                        <option value=""><?php echo __("Select Level", "resume-maker") ?></option>
                                        <option value="<?php echo __("Novice", "resume-maker") ?>"><?php echo __("Novice", "resume-maker") ?></option>
                                        <option value="<?php echo __("Beginner", "resume-maker") ?>"><?php echo __("Beginner", "resume-maker") ?></option>
                                        <option value="<?php echo __("Skillful", "resume-maker") ?>"><?php echo __("Skillful", "resume-maker") ?></option>
                                        <option value="<?php echo __("Experienced", "resume-maker") ?>"><?php echo __("Experienced", "resume-maker") ?></option>
                                        <option value="<?php echo __("Expert", "resume-maker") ?>"><?php echo __("Expert", "resume-maker") ?></option>
                                    </select>
                                    <div class="input_decor"></div>
                                </div>
                            </div>
                        </div>
                        <span @click="delete_list(skill.id, 'skill')" class="delete-rm-list">
                            <svg width="20" height="20" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M14 6h3v2H3V6h3V3c0-.55228.44772-1 1-1h6c.5523 0 1 .44772 1 1v3zm-9 4h10v8H5v-8zm2 6h6v-4H7v4zm5-10V4H8v2h4z"></path></svg>
                        </span>
                    </div>

                    <div @click="add_list('skill')" v-if="skills.length === 0" class="add-skill">+ <?php echo __("Add skill", "resume-maker") ?></div>
                    <div @click="add_list('skill')" v-if="skills.length" class="add-skill">+ <?php echo __("Add one more skill", "resume-maker") ?></div>
                </div>
            </div>

            <div class="rm-section">
                <h3><?php echo __("Languages", "resume-maker") ?></h3>
                <div class="guide-info"><p><?php echo __("Express your language skills, select a few languages in which you are proficient.", "resume-maker") ?></p></div>
                <div class="languages">

                    <div v-for="(language, index) in languages" :key="index" class="innerForm">
                        <div class="rm-list">
                            <h3>{{language.language}}</h3>
                            <span class="collapse_icon"><svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M9.431 7.257l1.352-1.474 5.893 5.48a1 1 0 0 1 0 1.474l-5.893 5.45-1.352-1.475L14.521 12 9.43 7.257z"></path></svg></span>
                        </div>

                        <div class="list-contents">
                            <div class="rm-2-fields">
                                <div class="rm-field">
                                    <label :for="'language-'+language.id"><?php echo __("Language", "resume-maker") ?></label>
                                    <input v-model="language.language" class="rm-inp" type="text" :id="'language-'+language.id">
                                    <div class="input_decor"></div>
                                </div>
                                <div class="rm-field">
                                    <label :for="'language-level-'+language.id"><?php echo __("Level", "resume-maker") ?></label>
                                    <select v-model="language.level" class="rm-inp" :id="'language-level-'+language.id">
                                        <option value=""><?php echo __("Select Level", "resume-maker") ?></option>
                                        <option value="<?php echo __("Native speaker", "resume-maker") ?>"><?php echo __("Native speaker", "resume-maker") ?></option>
                                        <option value="<?php echo __("Highly proficient", "resume-maker") ?>"><?php echo __("Highly proficient", "resume-maker") ?></option>
                                        <option value="<?php echo __("Very good comand", "resume-maker") ?>"><?php echo __("Very good comand", "resume-maker") ?></option>
                                    </select>
                                    <div class="input_decor"></div>
                                </div>
                            </div>
                        </div>
                        
                        <span @click="delete_list(language.id, 'language')" class="delete-rm-list">
                            <svg width="20" height="20" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M14 6h3v2H3V6h3V3c0-.55228.44772-1 1-1h6c.5523 0 1 .44772 1 1v3zm-9 4h10v8H5v-8zm2 6h6v-4H7v4zm5-10V4H8v2h4z"></path></svg>
                        </span>
                    </div>

                    <div @click="add_list('language')" v-if="languages.length === 0" class="add-language">+ <?php echo __("Add language", "resume-maker") ?></div>
                    <div @click="add_list('language')" v-if="languages.length" class="add-language">+ <?php echo __("Add one more language", "resume-maker") ?></div>
                </div>
            </div>
        </div>
        
        <div class="rm-output" id="rm-output">
            <div class="resume_container">
                <div class="resume_holder">
                    <img class="pdf-logo" width="50px" height="50px" src="<?php echo RESUME_MAKER_URL."public/images/logo.png" ?>">
                    <div class="resume-contents">
                        <div v-show="personalInfo.fname !== '' || personalInfo.lname !== ''" class="resume_header">
                            <h1>{{personalInfo.fname}}</h1>
                            <h1>{{personalInfo.lname}}</h1>
                        </div>
                        <div class="resume_body">
                            <div v-show="personalInfo.phone !== '' || personalInfo.email !== '' || personalInfo.city !== '' || personalInfo.birthdate !== '' || skills.length || languages.length" class="resume_left">
                                <div v-show="personalInfo.phone !== '' || personalInfo.email !== '' || personalInfo.city !== '' || personalInfo.birthdate !== ''" class="resume_details">
                                    <h2 class="regular_heading">
                                        <?php 
                                            $detailsText = ((get_option('rm_text_details'))?get_option('rm_text_details'):'Details');
                                            echo __($detailsText, "resume-maker");
                                        ?>
                                    </h2>

                                    <div v-show="personalInfo.phone !== ''" class="detail">
                                        <h4>
                                            <?php 
                                                $phoneText = ((get_option('rm_text_phone'))?get_option('rm_text_phone'):'Phone');
                                                echo __($phoneText, "resume-maker");
                                            ?>
                                        </h4>
                                        <p>{{personalInfo.phone}}</p>
                                    </div>

                                    <div v-show="personalInfo.email !== ''" class="detail">
                                        <h4>
                                            <?php 
                                                $emailText = ((get_option('rm_text_email'))?get_option('rm_text_email'):'Email');
                                                echo __($emailText, "resume-maker");
                                            ?>
                                        </h4>
                                        <p>{{personalInfo.email}}</p>
                                    </div>

                                    <div v-show="personalInfo.city !== ''" class="detail">
                                        <h4>
                                            <?php 
                                                $cityText = ((get_option('rm_text_city'))?get_option('rm_text_city'):'City');
                                                echo __($cityText, "resume-maker");
                                            ?>
                                        </h4>
                                        <p>{{personalInfo.city}}</p>
                                    </div>

                                    <div v-show="personalInfo.birthdate !== ''" class="detail">
                                        <h4>
                                            <?php 
                                                $birthdayText = ((get_option('rm_text_birthday'))?get_option('rm_text_birthday'):'Birthday');
                                                echo __($birthdayText, "resume-maker");
                                            ?>
                                        </h4>
                                        <p>{{personalInfo.birthdate}}</p>
                                    </div>
                                </div>

                                <div v-show="skills.length" class="resume_skills">
                                    <h2 class="regular_heading">
                                        <?php 
                                            $skillsText = ((get_option('rm_text_skills'))?get_option('rm_text_skills'):"Skill's");
                                            echo __($skillsText, "resume-maker");
                                        ?>
                                    </h2>
                                    <div class="sikills listed_skills">
                                        <ul class="newSection">
                                            <li data-type="skill" v-for="(skill, index) in skills" :key="index">{{skill.skill}} <sup>{{skill.level}}</sup></li>
                                        </ul>
                                    </div>
                                </div>

                                <div v-show="languages.length" class="resume_lang">
                                    <h2 class="regular_heading">
                                        <?php 
                                            $languagesText = ((get_option('rm_text_languages'))?get_option('rm_text_languages'):'Languages');
                                            echo __($languagesText, "resume-maker");
                                        ?>
                                    </h2>
                                    <div class="languages">
                                        <ul class="newSection">
                                            <li data-type="language" v-for="(language, index) in languages" :key="index">{{language.language}} <sup>{{language.level}}</sup></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="resume_right">
                                <?php $undefined = ((get_option('rm_text_undefined'))?get_option('rm_text_undefined'):'Undefined'); ?>
                                <div v-show="personalInfo.description !== ''" class="resume_profile">
                                    <h2 class="regular_heading">
                                        <?php 
                                            $profileText = ((get_option('rm_text_profile'))?get_option('rm_text_profile'):'Profile');
                                            echo __($profileText, "resume-maker");
                                        ?>
                                    </h2>
                                    <P>{{personalInfo.description}}</P>
                                </div>
                                
                                <div v-show="educations.length && personalInfo.description !== ''" class="devider"></div>

                                <div v-show="educations.length" class="resume_education">
                                    <h2 class="regular_heading">
                                        <?php 
                                            $educationsText = ((get_option('rm_text_educations'))?get_option('rm_text_educations'):'Educations');
                                            echo __($educationsText, "resume-maker");
                                        ?>
                                    </h2>
                                    <div class="inner-sections educations">
                                        <ul class="newSection">
                                            <li v-for="(education, index) in educations" :key="index" data-type="education" class="inner-section">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $schoolText = ((get_option('rm_text_school'))?get_option('rm_text_school'):'School');
                                                                    echo __($schoolText.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="education.school !== ''">{{education.school}}</td>
                                                            <td v-show="education.school === ''"><?php echo __($undefined, "resume-maker") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $certificateText = ((get_option('rm_text_certificate'))?get_option('rm_text_certificate'):'Certificate');
                                                                    echo __($certificateText.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="education.degree !== ''">{{education.degree}}</td>
                                                            <td v-show="education.degree === ''"><?php echo __($undefined, "resume-maker"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $startendText = ((get_option('rm_text_start_end_date'))?get_option('rm_text_start_end_date'):'Start & End Date');
                                                                    echo __($startendText.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="education.startDate !== '' && education.endDate !== ''">{{education.startDate}} - {{education.endDate}}</td>
                                                            <td v-show="education.startDate === '' && education.endDate === ''"><?php echo __($undefined, "resume-maker"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $city2Text = ((get_option('rm_text_city'))?get_option('rm_text_city'):'City');
                                                                    echo __($city2Text.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="education.city !== ''">{{education.city}}</td>
                                                            <td v-show="education.city === ''"><?php echo __($undefined, "resume-maker"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $descriptionText = ((get_option('rm_text_description'))?get_option('rm_text_description'):'Description');
                                                                    echo __($descriptionText.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="education.desc !== ''">{{education.desc}}</td>
                                                            <td v-show="education.desc === ''"><?php echo __($undefined, "resume-maker"); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div v-show="employments.length && educations.length" class="devider"></div>

                                <div v-show="employments.length" class="resume_employment_history">
                                    <h2 class="regular_heading">
                                        <?php 
                                            $employmentHistoriesText = ((get_option('rm_text_employment_histories'))?get_option('rm_text_employment_histories'):'EMPLOYMENT HISTORIES');
                                            echo __($employmentHistoriesText, "resume-maker");
                                        ?>
                                    </h2>
                                    <div class="inner-sections employments">
                                        <ul class="newSection">
                                            <li v-for="(employment, index) in employments" :key="index" data-type="employment" class="inner-section">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $jobTitleText = ((get_option('rm_text_job_title'))?get_option('rm_text_job_title'):'Job Title');
                                                                    echo __($jobTitleText.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="employment.jobTitle !== ''">{{employment.jobTitle}}</td>
                                                            <td v-show="employment.jobTitle === ''"><?php echo __($undefined, "resume-maker"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $employerText = ((get_option('rm_text_employer'))?get_option('rm_text_employer'):'Employer');
                                                                    echo __($employerText.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="employment.employer !== ''">{{employment.employer}}</td>
                                                            <td v-show="employment.employer === ''"><?php echo __($undefined, "resume-maker"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $startend2Text = ((get_option('rm_text_start_end_date'))?get_option('rm_text_start_end_date'):'Start & End Date');
                                                                    echo __($startend2Text.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="employment.startDate !== '' && employment.endDate !== ''">{{employment.startDate}} - {{employment.endDate}}</td>
                                                            <td v-show="employment.startDate === '' && employment.endDate === ''"><?php echo __($undefined, "resume-maker"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $city3Text = ((get_option('rm_text_city'))?get_option('rm_text_city'):'City');
                                                                    echo __($city3Text.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="employment.city !== ''">{{employment.city}}</td>
                                                            <td v-show="employment.city === ''"><?php echo __($undefined, "resume-maker"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <?php 
                                                                    $description2Text = ((get_option('rm_text_description'))?get_option('rm_text_description'):'Description');
                                                                    echo __($description2Text.":", "resume-maker");
                                                                ?>
                                                            </th>
                                                            <td v-show="employment.desc !== ''">{{employment.desc}}</td>
                                                            <td v-show="employment.desc === ''"><?php echo __($undefined, "resume-maker"); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button data-name="resume-2022" id="download-resume" class="download_btn"><?php echo __("Download", "resume-maker") ?></button>
        </div>
    </div>
</div>
