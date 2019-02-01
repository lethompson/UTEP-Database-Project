//use f17cs4342team08;
//DatabaseManagement/Assignment3/
use AWSEDU;
CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email`    VARCHAR(255) NOT NULL,
  `role`     VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


INSERT INTO `users` (username,password,email,role) VALUES ('admin','admin1','lethompson@miners.utep.edu','coordinator'),('user','user1','lethompson1024@gmail.com','teacher'),('admin22','admin11','admin@utep.edu','coordinator'),('lthompson4115','205cuPA!','lthompson@yahoo.com','teacher'),('thom1024','thom1024','reyes@gmail.com','judge');

CREATE TABLE `user_name` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(255) NOT NULL,
  `lname` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES users(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `user_name` (fname,lname) VALUES 
('Lennox','Thompson'),
('James','Smith'),
('Antonio','Tarver'),
('Ray','Lewis');





//New
CREATE TABLE `category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

//New
INSERT INTO `category` (name) VALUES
('Chemistry'),
('Math'),
('Physical Science'),
('Earth Science');

SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `project` (
  `pid` INT(11) NOT NULL AUTO_INCREMENT,
  `id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `year` INT(4) NOT NULL,
  `description` VARCHAR(255) NOT NULL, 
  `picture`    VARCHAR(255) NOT NULL,
  PRIMARY KEY (`pid`,`id`),
  FOREIGN KEY (`id`) REFERENCES category(`id`) 
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

//New
INSERT INTO `project` (pid,id,name,year,description,picture) VALUES
(1,1,'3D model of chemical molecules',2017,'chemical molecules displayed in 3D in python using Mayavi','snapshot_molecules.jpg'),
(2,2'Dynamic model of the helix',2017,'helix cosine and sine functions plotted in Matlab computing software with different parametric parameter values','snapshot_helix.jpg'),
(3,3,'Propagation of the 2D wave equation in a rod',2017,'2D wave equation modeling done in Matlab computing software' ,'snapshot_wave_equ.jpg'),
(4,4,'Geologic Mapping of the Franklin Mountains',2017,'Map the Franklin Mountains using field mapping techniques','geo_mapping_texas.png');

CREATE TABLE `review` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `rid` INT(11) NOT NULL, 
  `pid` INT(11) NOT NULL,
  `total_score_all` INT(11) NOT NULL,
  `average_score_all`  DECIMAL(19,2) NOT NULL,
  PRIMARY KEY (`id`,`rid`,`pid`),
  FOREIGN KEY (`id`) REFERENCES users(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`rid`) REFERENCES scoring_rubric(`rid`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`pid`) REFERENCES project(`pid`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


//New table
CREATE TABLE `student_project` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name`VARCHAR(30) NOT NULL, 
  `grade_level` VARCHAR(11) NOT NULL,
  `school` VARCHAR(30) NOT NULL,
  `teacher_name`  VARCHAR(30) NOT NULL,
  `project_title` VARCHAR(50) NOT NULL,
  `category`    VARCHAR(50) NOT NULL,
  `description` VARCHAR(255) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;



INSERT INTO `student_project` (name,grade_level,school,teacher_name,project_title,category,description) VALUES
('Jonathan Jones','6th grade','Reyes Elementary','Ann Gates','3D model of chemical molecules','chemistry','chemical molecules displayed in 3D in python using Mayavi'),
('Aaron Brown','7th grade','Reyes Elementary','Elizabeth Anthony','Dynamic model of the helix','math','helix cosine and sine functions'),
('Ron Gonzalez','8th grade','Reyes Elementary','Marianne Karplus','Propagation of the 2D wave equation','physical science','2D wave equation modeled using Matlab software'),
('Cara Gannaway','6th grade','Reyes Elementary','Katherine Giles','Geologic Mapping of the Franklin Mountains','earth science','Map the Franklin Mountains using field mapping techniques'),
('Claire Bailey','5th grade','Reyes Elementary','Diane Doser','How DNA Works','earth science','How DNA Works and the functionality of DNA');


INSERT INTO `review` (id,rid,pid,total_score_all,average_score_all) VALUES
(1,1,1,1508,85.45);

CREATE TABLE `scoring_rubric` (
  `rid` INT(11) NOT NULL AUTO_INCREMENT,
  `classification_pts` INT(11) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `scoring_rubric` (classification_pts) VALUES
(35),
(20),
(30),
(15);

CREATE TABLE `criteria` (
  `cr_id` INT(11) NOT NULL AUTO_INCREMENT,
  `grade` INT(11) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `classification` VARCHAR(255) NOT NULL, 
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `criteria` (grade,description,classification) VALUES
(4,'Presented a question that could be answered through experimentation.','Scientific Method'),
(3,'Clearly identified and explained key scientific concepts relating to the experiment.','Scientific Method'),
(3,'Understands the basic science relevance of the project','Presentation'),
(4,'Shows enthusiasm and interest in the project','Creativity');


CREATE TABLE `contains` (
  `rid` INT(11) NOT NULL AUTO_INCREMENT,
  `cr_id` INT(11) NOT NULL,
  PRIMARY KEY (`rid`,`cr_id`),
  FOREIGN KEY (`rid`) REFERENCES scoring_rubric(`rid`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`cr_id`) REFERENCES criteria(`cr_id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;



//New
CREATE TABLE `student` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `school` VARCHAR(255) NOT NULL, 
  `grade_level` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

//New
INSERT INTO `student` (school,grade_level) VALUES
('Reyes Elementary School','6th grade'),
('Reyes Elementary School','7th grade'),
('Reyes Elementary School','8th grade'),
('Reyes Elementary School','7th grade');

//New
CREATE TABLE `teacher_name` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fname_teacher` VARCHAR(255) NOT NULL,
  `lname_teacher` VARCHAR(255) NOT NULL, 
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES student(`id`) ON UPDATE CASCADE ON DELETE CASCADE   
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

//New
INSERT INTO `teacher_name` (fname_teacher,lname_teacher) VALUES
('Ann','Gates'),
('Elizabeth','Anthony'),
('Marianne','Karplus'),
('Katherine','Giles');


//New
CREATE TABLE `student_name` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(255) NOT NULL,
  `lname` VARCHAR(255) NOT NULL, 
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES student(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

//New
INSERT INTO `student_name` (fname,lname) VALUES
('Jonathan','Jones'),
('Aaron','Brown'),
('Ron','Gonzalez'),
('Kate','Grisi');


//Fname,Lname,grade level, school, teacher name of all students & who have a project
select  student_name.id, CONCAT(student_name.fname, ' ', student_name.lname) AS `student names`,grade_level,school, CONCAT(teacher_name.fname_teacher, ' ', teacher_name.lname_teacher) AS `teacher of project` FROM student_name JOIN student JOIN teacher_name WHERE student_name.id = student.id AND student.id = teacher_name.id;



CREATE TABLE `create` (
  `pid` INT(11) NOT NULL AUTO_INCREMENT,
  `id` INT(11) NOT NULL,
  PRIMARY KEY (`pid`,`id`),
  FOREIGN KEY (`pid`) REFERENCES project(`pid`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`id`) REFERENCES student(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

//New Table for Scoring_Rubric.php
CREATE TABLE `student_scoring_rubric` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `student_name`  VARCHAR(30) NOT NULL,
  `teacher_name`  VARCHAR(30) NOT NULL,
  `project_title` VARCHAR(30) NOT NULL, 
  `category`      VARCHAR(30) NOT NULL,
  `grade`         VARCHAR(5) NOT NULL,
  `total`         INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


INSERT INTO `student_scoring_rubric` (student_name,teacher_name,project_title,category,grade,total) VALUES ('Jonathan Jones','Ann Gates','3D model of chemical molecules','chemistry','6th',88),
('Aaron Brown','Elizabeth Anthony','Dynamic model of the helix','math','7th',76),
('Ron Gonzalez','Marianne Karplus','Propagation of the 2D wave equation','physical science','8th',80),
('Cara Gannaway','Katherine Giles','Geologic Mapping of the Franklin Mountains','earth science','6th',70),
('Claire Bailey','Diane Doser','How DNA Works','life science','5th',90);



//View for all Student Projects for the Science Fair
//Not Correct
SELECT DISTINCT CONCAT(SN.fname,' ',SN.lname) AS Student_Name,S.school AS School,S.grade_level AS Grade, CONCAT(TN.fname_teacher,' ',TN.lname_teacher) AS Teacher_Name, P.name AS Project, C.name AS Category FROM student S, student_name SN, teacher_name TN, project P, category C WHERE SN.id = TN.id;

//------------------------------Student,school,grade,project -------------------------------------//
use CS4342;
CREATE VIEW All_Student_Projects AS select DISTINCT  S.id, CONCAT(ST.fname,' ',ST.lname) AS Student, S.school,S.grade_level,P.name AS Project FROM student S,student_name ST,project P WHERE S.id = ST.id AND S.id=P.pid;

//-----------------------------View and Teacher Name (Student,School,grade,teacher,project,category)--------//
use CS4342;
SELECT A.id,A.Student,A.grade_level AS Grade,A.school AS School,A.Project,CONCAT(TN.fname_teacher,' ',TN.lname_teacher) AS Teacher,C.name AS Category FROM all_student_projects as A,teacher_name as TN, category C WHERE A.id = TN.id AND C.id=A.id;

SELECT A.id,A.Student,A.school AS School,A.grade_level AS Grade,A.Project,CONCAT(TN.fname_teacher,' ',TN.lname_teacher) AS Teacher,C.name AS Category FROM all_student_projects A,category C,teacher_name TN WHERE A.id=C.id AND A.id=TN.id; 


//--------------------------Create a View (Student,School,grade,teacher,project,category) ------------------//
use CS4342;

CREATE VIEW Student_Projects AS SELECT A.id,A.Student,A.grade_level AS Grade,A.school AS School,A.Project,CONCAT(TN.fname_teacher,' ',TN.lname_teacher) AS Teacher,C.name AS Category FROM all_student_projects as A,teacher_name as TN, category C WHERE A.id = TN.id AND C.id=A.id;

//--------------------------Create a View (Student,School,Grade,Teacher,Project,Category,Total) ---------//

use CS4342;

CREATE VIEW Student_Projects_Total AS SELECT SP.id,SP.Student,SP.Grade,SP.School,SP.Project,SP.Teacher,SP.Category, SR.total AS Total FROM student_projects SP,scoring_rubric SR WHERE SP.id = SR.rid;

//ALTERNATIVE WITHOUT WHERE clause in query
CREATE VIEW Student_Projects_Total AS SELECT SP.id,SP.Student,SP.Grade,SP.School,SP.Project,SP.Teacher,SP.Category, SR.total AS Total FROM student_projects SP INNER JOIN scoring_rubric SR ON SR.rid=SP.id;


//---------------------------Query for Category PHP Page----------------------------------//
use CS4342;
select  P.pid,C.name,P.name,P.description,P.year,P.picture FROM category C, project P WHERE C.id=P.pid;



//---------------------------Stored Procedure---------------------------------------------//
\d//
CREATE PROCEDURE AddStudentInfo() BEGIN
       INSERT INTO student (school,grade_level) VALUES ('Reyes Elementary','1st grade');
       SELECT * FROM student;
END//
mysql>\d;

mysql> call AddStudentInfo;
//-----------------------------------------------------------------------------------------//

//-----------------------------Trigger---------------------------------------------------------//
\d//
CREATE TRIGGER addStudent_info_trigger before
    INSERT ON student_name for each
    row begin insert into student
    set id.new.id;
END//
mysql>\d;

mysql> INSERT INTO student_name (fname,lname) VALUES ('Steve','Trevor');


//---------------------------------------------------------------------------------------------//


