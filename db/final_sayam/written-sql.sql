CREATE TABLE Teacher(
    t_id INT(100) NOT NULL AUTO_INCREMENT,
    t_tag VARCHAR(100) NOT NULL,
    t_name VARCHAR(100) NOT NULL,
    t_email VARCHAR(100) NOT NULL,
    t_password VARCHAR(100) NOT NULL,
    t_department VARCHAR(100) NOT NULL,
    t_phone INT(50) NOT NULL,
    t_photo VARCHAR(200) NOT NULL,
     PRIMARY KEY (t_id)  
    );

.................................................................

CREATE TABLE Student(
    s_id INT(100) NOT NULL AUTO_INCREMENT,
    s_tag VARCHAR(100) NOT NULL,
    s_name VARCHAR(100) NOT NULL,
    s_email VARCHAR(100) NOT NULL,
    s_password VARCHAR(100) NOT NULL,
    s_department VARCHAR(100) NOT NULL,
    s_batch INT(50) NOT NULL,
    s_phone INT(50) NOT NULL,
    s_photo VARCHAR(200) NOT NULL,
     PRIMARY KEY (s_id)  
    );

....................................................................

CREATE TABLE Course(
   c_code VARCHAR(100) NOT NULL,
   c_name VARCHAR(100) NOT NULL,
   
   PRIMARY KEY(c_code)
);

.....................................................................

CREATE TABLE Wallet(
    w_balance VARCHAR(100) NOT NULL,
    r_tag VARCHAR(100) NOT NULL
    
    );

.....................................................................

CREATE TABLE Section(
    
    c_code VARCHAR(100) NOT NULL,
    t_id INT(100) NOT NULL,
    sec_name VARCHAR(100) NOT  NULL,
    sec_start_time DATETIME NOT NULL,
    sec_end_time DATETIME NOT NULL,
    sec_room_number INT(50),
    sec_rfid_reader VARCHAR(100) NOT NULL,
    sec_trimester VARCHAR(100) NOT NULL
    
    );
    
    
....................................................................


CREATE TABLE Service(
    serv_id VARCHAR(100) NOT NULL,
    serv_name VARCHAR(100) NOT NULL,
    serv_balance VARCHAR(100) NOT NULL,
    serv_reader_id VARCHAR(100) NOT NULL
    
    );

................................................................


CREATE TABLE Attendance(
    
    sec_name VARCHAR(100) NOT  NULL,
    t_id INT(100) NOT  NULL,
    s_id INT(100) NOT NULL
    
    );

..................................................................

CREATE TABLE Transaction(
    
    tr_id VARCHAR(100) NOT NULL,
    r_tag VARCHAR(100) NOT NULL,
    serv_id VARCHAR(100) NOT NULL,
    tr_amount VARCHAR(100) NOT NULL,
    tr_type VARCHAR(100) NOT NULL
    
    );

....................................................................

CREATE TABLE teacherJcourse(
    t_id INT(100) NOT NULL,
    c_code VARCHAR(100) NOT NULL
    );

....................................................................

CREATE TABLE studentJcourse(
    s_id INT(100) NOT NULL,
    c_code VARCHAR(100) NOT NULL
    );

....................................................................

CREATE TABLE studentJsection(
    s_id INT(100) NOT NULL,
    c_code VARCHAR(100) NOT NULL,
    sec_name VARCHAR(100) NOT NULL
    );

..........................................................

ALTER TABLE Student
ADD FOREIGN KEY (s_tag) REFERENCES Rfid(r_tag);

ALTER TABLE teacherJcourse
ADD FOREIGN KEY (t_id) REFERENCES Teacher(t_id),
ADD FOREIGN KEY(c_code) REFERENCES Course(c_code);

ALTER TABLE studentJcourse
ADD FOREIGN KEY(s_id)REFERENCES Student(s_id),
ADD FOREIGN KEY(c_code) REFERENCES Course(c_code);

ALTER TABLE Transaction
ADD FOREIGN KEY (serv_id) REFERENCES Service(serv_id);
ADD FOREIGN KEY(r_tag) REFERENCES Wallet(r_tag)


ALTER TABLE Wallet
ADD FOREIGN KEY (r_tag) REFERENCES Rfid(r_tag);

ALTER TABLE Section
ADD FOREIGN KEY (c_code) REFERENCES Course(c_code),
ADD FOREIGN KEY (t_id) REFERENCES Teacher(t_id);

ALTER TABLE Service
ADD PRIMARY KEY serv_id;


ALTER TABLE studentJsection
ADD FOREIGN KEY(s_id)REFERENCES Student(s_id),
ADD FOREIGN KEY(c_code) REFERENCES Course(c_code),
ADD FOREIGN KEY(sec_name) REFERENCES Section(sec_name);


ALTER TABLE Attendance
ADD FOREIGN KEY (sec_name) REFERENCES Section(sec_name),
ADD FOREIGN KEY (t_id) REFERENCES Teacher(t_id),
ADD FOREIGN KEY(s_id)REFERENCES Student(s_id);


INSERT INTO `Rfid` (`r_tag`, `r_role`) VALUES ('0EEF3A1A', 'Student');

INSERT INTO `Rfid` (`r_tag`, `r_role`) VALUES ('B7ED4C19', 'Student');

INSERT INTO `Rfid` (`r_tag`, `r_role`) VALUES ('97C9567B', 'Teacher');


INSERT INTO `Student` (`s_id`, `s_tag`, `s_name`, `s_email`, `s_password`, `s_department`, `s_batch`, `s_phone`, `s_photo`) VALUES ('011172070', '0EEF3A1A', 'MD. AKIB AL JAWAD ARNOB', 'akibaljawadarnob@gmail.com', 'arnob1234', 'CSE', '172', '01521418857', NULL);

INSERT INTO `Student` (`s_id`, `s_tag`, `s_name`, `s_email`, `s_password`, `s_department`, `s_batch`, `s_phone`, `s_photo`) VALUES ('011163071', 'B7ED4C19', 'ALI IKTIDER SAYAM', 'asayam163071@bscse.uiu.ac.bd', 'sayam1234', 'CSE', '163', '01721716139', NULL);

INSERT INTO `Teacher` (`t_id`, `t_tag`, `t_name`, `t_email`, `t_password`, `t_department`, `t_phone`, `t_photo`) VALUES ('011233', '97C9567B', 'SAKIBUR ROHIT SAJAL', 'sajal@gmail.com', 'sajal1234', 'CSE', '01756013171', NULL);



............................02/04.2020...................................

INSERT INTO `Course` (`c_code`, `c_name`) VALUES ('MATH 205', 'Probability and Statistics');


ALTER TABLE Section
MODIFY sec_start_time time(6),
MODIFY sec_end_time time(6)

INSERT INTO `Section` (`c_code`, `t_id`, `sec_name`, `sec_start_time`, `sec_end_time`, `sec_room_number`, `sec_rfid_reader`, `sec_trimester`) VALUES ('MATH 205', '11233', 'A', '11:40:00.000000', '01:10:00.000000', '322', '1A', '201');

INSERT INTO `Course` (`c_code`, `c_name`) VALUES ('MATH 003', 'Elementary Calculus ');


INSERT INTO `Rfid` (`r_tag`, `r_role`) VALUES ('BB09101C', 'Student');

INSERT INTO `Rfid` (`r_tag`, `r_role`) VALUES ('9AF92F16', 'Teacher');

INSERT INTO `Student` (`s_id`, `s_tag`, `s_name`, `s_email`, `s_password`, `s_department`, `s_batch`, `s_phone`, `s_photo`) VALUES ('011171327', 'BB09101C', 'FARZANA SULTANA SOHA', 'fsulatana@gmail.com', 'far123', 'CSE', '171', '01777660829', NULL);

INSERT INTO `Teacher` (`t_id`, `t_tag`, `t_name`, `t_email`, `t_password`, `t_department`, `t_phone`, `t_photo`) VALUES ('12233', '9AF92F16', 'NOVA MAM', 'nova@bscse.uiu.ac.bd', 'no1234', 'CSE', '01756013171', NULL);


INSERT INTO `Section` (`c_code`, `t_id`, `sec_name`, `sec_start_time`, `sec_end_time`, `sec_room_number`, `sec_rfid_reader`, `sec_trimester`) VALUES ('MATH 003', '12233', 'B', '08:30:00.000000', '10:00:00.000000', '402', '1B', '201');

INSERT INTO `studentJsection` (`s_id`, `c_code`, `sec_name`) VALUES ('11172070', 'MATH 205', 'A');

INSERT INTO `studentJsection` (`s_id`, `c_code`, `sec_name`) VALUES ('11163071', 'MATH 003', 'B');

INSERT INTO `studentJcourse` (`s_id`, `c_code`) VALUES ('11163071', 'MATH 003');

INSERT INTO `studentJcourse` (`s_id`, `c_code`) VALUES ('11171070', 'MATH 205');

    
    





...................................7/7/20...................................

ALTER TABLE student
ADD Registered VARCHAR(100) NOT NULL DEFAULT 'NO';


------------------------------------------------------------
ALTER TABLE attendance
MODIFY time time(0);


---------------------------------------------------------------
CREATE TABLE temp_transaction(
    id INT(100)   [demo]
);


-----------------------------------------------------------------
CREATE TABLE payment_state(
     payment_id INT(100) NOT NULL AUTO_INCREMENT,
     payment_state VARCHAR(100),
     
     PRIMARY KEY(payment_id) 
    );


--------------------------------------------------------------------
CREATE TABLE item_list(
     item_id INT(100) NOT NULL AUTO_INCREMENT, 
     item VARCHAR(100),
     price INT(100),
     
     PRIMARY KEY(item_id) 
    )


-------------------------------------------------------------------
CREATE TABLE vendor(
     r_tag VARCHAR(100) NOT NULL,
     vendor_id INT(100) NOT NULL AUTO_INCREMENT, 
     vendor_name VARCHAR(100) NOT NULL,
     
     PRIMARY KEY(vendor_id)
    );


----------------------------------------------------------------
ALTER TABLE vendor
ADD FOREIGN key(r_tag) REFERENCES rfid(r_tag);


----------------------------------------------
ALTER TABLE item_list
ADD COLUMN vendor_id INT(100) NOT NULL


--------------------------------------------------------
ALTER TABLE item_list
ADD FOREIGN key(vendor_id) REFERENCES vendor(vendor_id)


---------------------------18/07/2020---------------------------------

ALTER TABLE vendor
ADD COLUMN password VARCHAR(100) NOT NULL,
ADD COLUMN email VARCHAR(100) NOT NULL,
ADD COLUMN phone_no INT(100) NOT NULL,
ADD COLUMN image VARCHAR(200) NOT NULL;

--------------------------------------------------------------------

CREATE TABLE admin(
    a_id INT(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL, 
    password VARCHAR(100) NOT NULL,
    
    PRIMARY KEY(a_id)
    )

------------------------------------------------------------------

INSERT INTO admin(a_id,username,email,password) VALUES('1','sayam','sayam@gmail.com','say')

--------------------------------31/07/2020---------------------------------

INSERT INTO attendance (sec_name, t_id, s_id, date, time) VALUES
('MATH 003 A', 'F01192137', 11163071, '2020-05-02', '2020-05-26 15:36:29'),
('MATH 003 A', 'F01192137', 11163071, '2020-05-05', '2020-05-26 15:36:29'),
('MATH 003 A', 'F01192137', 11163071, '2020-05-09', '2020-05-26 15:36:29'),
('MATH 003 A','F01192137', 11163071, '2020-05-12', '2020-05-26 15:36:29'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-03', '2020-05-26 15:38:37'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-06', '2020-05-26 15:38:37'),
('CSI 321 A','F01172096', 11163071, '2020-05-10', '2020-05-26 15:38:37'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-13', '2020-05-26 15:38:37'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-17', '2020-05-26 15:38:37'),
('CSI 322 C','F01172096', 11163071, '2020-05-02', '2020-05-26 15:39:26'),
('CSI 322 C', 'F01172096', 11163071, '2020-05-09', '2020-05-26 15:39:26'),
('CSI 322 C', 'F01172096', 11163071, '2020-05-16', '2020-05-26 15:39:26'),
('MATH 201 B', 'F01172096', 11163071, '2020-05-03', '2020-05-26 15:40:23'),
('MATH 201 B', 'F01172096', 11163071, '2020-05-06', '2020-05-26 15:40:23'),
('MATH 201 B', 'F01172096', 11163071, '2020-05-10', '2020-05-26 15:40:23'),
('MATH 201 B', 'F01172096', 11163071, '2020-05-13', '2020-05-26 15:40:23'),
('CSI 415 D',  'F01192137', 11163071, '2020-05-03', '2020-05-26 15:43:31'),
('CSI 415 D',  'F01192137', 11163071, '2020-05-06', '2020-05-26 15:43:31'),
('CSI 415 D',  'F01192137', 11163071, '2020-05-10', '2020-05-26 15:43:31'),
('CSI 415 D',  'F01192137', 11163071, '2020-05-13', '2020-05-26 15:43:31'),
('CSI 321 A', 'F01172096', 11163071, '2020-05-28', '2020-05-27 18:56:34'),
('CSI 321 A','F01172096', 11163071, '2020-05-28', '2020-05-27 18:56:36');

--------------------------------------------------------------------------

INSERT INTO teacherjcourse (t_id, c_code) VALUES
('F01172096', 'CSI 321'),
('F01172096', 'CSI-233'),
('F01172096', 'CSI 322'),
('F01192137', 'CSI 415'),
('F01192137', 'CSI 416'),
('F01172096', 'Math 201'),
('F01192137', 'MATH 003'),
('F01192137', 'MATH 205');

................... 27.08.20 ............................................................


INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES
 ('CSI 411 B', '2020-08-25', 'regular'),
 ('CSI 411 B', '2020-08-29', 'regular'),
 ('CSI 411 B', '2020-09-01', 'regular'),
 ('CSI 411 B', '2020-09-05', 'regular'),
 ('CSI 411 B', '2020-09-08', 'regular'),
 ('CSI 411 B', '2020-09-12', 'regular'),
 ('CSI 411 B', '2020-09-14', 'make up'),
 ('CSI 411 B', '2020-09-15', 'regular'),
 ('CSI 411 B', '2020-08-19', 'regular'),
 ('CSI 411 B', '2020-09-22', 'regular'),
 ('CSI 411 B', '2020-09-26', 'regular'),
 ('CSI 411 B', '2020-09-29', 'regular');


INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES ('CSI 341 B', '2020-08-26', 'regular'),
('CSI 341 B', '2020-08-30', 'regular'),
('CSI 341 B', '2020-09-02', 'regular'),
('CSI 341 B', '2020-09-06', 'regular'),
('CSI 341 B', '2020-09-07', 'make up'),
('CSI 341 B', '2020-09-09', 'regular'),
('CSI 341 B', '2020-09-13', 'regular'),
('CSI 341 B', '2020-09-16', 'regular'),
('CSI 341 B', '2020-09-20', 'regular'),
('CSI 341 B', '2020-09-23', 'regular'),
('CSI 341 B', '2020-09-27', 'regular'),
('CSI 341 B', '2020-09-28', 'make up');


INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES ('CSI 342 B', '2020-08-30', 'regular'),
('CSI 342 B', '2020-09-06', 'regular'),
('CSI 342 B', '2020-09-07', 'make up'),
('CSI 342 B', '2020-09-13', 'regular'),
('CSI 342 B', '2020-09-20', 'regular'),
('CSI 342 B', '2020-09-27', 'regular'),
('CSI 342 B', '2020-09-28', 'make up');



INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES ('CSE 465 A', '2020-07-04', 'regular'),
('CSE 465 A', '2020-07-11', 'regular'),
('CSE 465 A', '2020-07-18', 'regular'),
('CSE 465 A', '2020-07-20', 'make up'),
('CSE 465 A', '2020-07-25', 'regular'),
('CSE 465 A', '2020-08-08', 'regular'),
('CSE 465 A', '2020-08-29', 'regular'),
('CSE 465 A', '2020-09-05', 'regular'),
('CSE 465 A', '2020-09-12', 'regular'),
('CSE 465 A', '2020-09-19', 'regular'),
('CSE 465 A', '2020-09-26', 'regular'),
('CSE 465 A', '2020-09-14', 'makeup');


INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES ('CSI 424 B', '2020-07-07', 'regular'),
('CSI 424 B', '2020-07-14', 'regular'),
('CSI 424 B', '2020-07-21', 'regular'),
('CSI 424 B', '2020-07-28', 'regular'),
('CSI 424 B', '2020-08-04', 'regular'),
('CSI 424 B', '2020-08-10', 'make up'),
('CSI 424 B', '2020-08-18', 'regular'),
('CSI 424 B', '2020-08-25', 'regular'),
('CSI 424 B', '2020-09-01', 'regular'),
('CSI 424 B', '2020-09-08', 'regular'),
('CSI 424 B', '2020-09-15', 'regular'),
('CSI 424 B', '2020-08-22', 'regular'),
('CSI 424 B', '2020-09-29', 'regular');



INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES ('CSI 423 B', '2020-07-04', 'regular'),
('CSI 423 B', '2020-07-07', 'regular'),
('CSI 423 B', '2020-07-11', 'regular'),
('CSI 423 B', '2020-07-14', 'regular'),
('CSI 423 B', '2020-07-18', 'regular'),
('CSI 423 B', '2020-07-20', 'make up'),
('CSI 423 B', '2020-07-21', 'regular'),
('CSI 423 B', '2020-07-25', 'regular'),
('CSI 423 B', '2020-07-28', 'regular'),
('CSI 423 B', '2020-08-04', 'regular'),
('CSI 423 B', '2020-08-08', 'regular'),
('CSI 423 B', '2020-08-10', 'make up'),
('CSI 423 B', '2020-08-18', 'regular'),
('CSI 423 B', '2020-08-25', 'regular'),
('CSI 423 B', '2020-08-29', 'regular'),
('CSI 423 B', '2020-09-01', 'regular'),
('CSI 423 B', '2020-09-05', 'regular'),
('CSI 423 B', '2020-09-08', 'regular'),
('CSI 423 B', '2020-09-12', 'regular'),
('CSI 423 B', '2020-09-14', 'make up'),
('CSI 423 B', '2020-09-15', 'reghular'),
('CSI 423 B', '2020-09-19', 'regular'),
('CSI 423 B', '2020-09-22', 'regular'),
('CSI 423 B', '2020-09-26', 'regular'),
('CSI 423 B', '2020-09-29', 'regular');



................31.08.20...............................................

ALTER TABLE `vendor` ADD `vendor_uid` VARCHAR(100) NOT NULL AFTER `vendor_name`,
 ADD `vendor_password` VARCHAR(100) NOT NULL AFTER `vendor_uid`;



INSERT INTO `studentjcourse` (`s_id`, `c_code`) VALUES ('11172070', 'CSI 411'),
('11172070', 'CSI 341'),
('11172070', 'CSI 342'),
('11171327', 'CSI 423'),
('11171327', 'CSI 424'),
('11171327', 'CSE 465');


ALTER TABLE `transaction` ADD UNIQUE(`vendor_id`);"?

INSERT INTO `studentjsection` (`s_id`, `c_code`, `sec_name`) VALUES
 ('11172070', 'CSI 341', 'CSI 341 B'),
 ('11172070', 'CSI 342', 'CSI 342 B'),
 ('11172070', 'CSI 411', 'CSI 411 B'),
 ('11171327', 'CSE 465', 'CSE 465 A');


INSERT INTO `section` (`c_code`, `t_id`, `sec_name`, `sec_start_time`, `sec_end_time`, `sec_room_number`, `sec_rfid_reader`, `sec_trimester`) VALUES
 ('CSI 423', 'F01192137', 'CSI 423 B', '14:00:00', '15:30:00', '332', '332r', '201'),

 ('CSI 424', 'F01192137', 'CSI 424 B', '09:00:00', '11:30:00', '508', '508r', '201');


INSERT INTO `studentjsection` (`s_id`, `c_code`, `sec_name`) VALUES  
('11171327', 'CSI 423', 'CSI 423 B'),
('11171327', 'CSI 424', 'CSI 424 B');


ALTER TABLE transaction 
ADD FOREIGN KEY(vendor_id) REFERENCES vendor(vendor_id)


DELETE FROM classdate 
WHERE sec_name LIKE "CSI 411"









...........................14.09.20............................................

INSERT INTO `course` (`c_code`, `c_name`) VALUES
 ('CSI 311', 'System Analysis and Design '),
 ('CSI 312', 'System Analysis and Design Laboratory');


INSERT INTO `teacherjcourse` (`t_id`, `c_code`) VALUES
 ('F01192138', 'CSI 311'), ('F01192138', 'CSI 312');



INSERT INTO `section` (`c_code`, `t_id`, `sec_name`, `sec_start_time`, `sec_end_time`, `sec_room_number`, `sec_rfid_reader`, `sec_trimester`)
VALUES ('CSI 311', 'F01192138', 'CSI 311 B', '01:00:00', '23:00:00', '330', '330r', '202'),
 ('CSI 312', 'F01192138', 'CSI 312 C', '14:00:00', '16:30:00', '506', '506r', '202');



INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES
 ('CSI 311 B', '2020-09-14', 'regular'),
 ('CSI 311 B', '2020-09-15', 'regular'),
 ('CSI 311 B', '2020-09-16', 'regular'),
 ('CSI 311 B', '2020-09-17', 'regular'),
 ('CSI 311 B', '2020-09-18', 'make up'),
 ('CSI 311 B', '2020-09-19', 'regular'),
 ('CSI 311 B', '2020-09-20', 'regular'),
 ('CSI 311 B', '2020-09-21', 'make up'),
 ('CSI 311 B', '2020-09-23', 'regular'),
 ('CSI 311 B', '2020-09-24', 'regular');



INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES 
('CSI 312 C', '2020-09-25', 'regular'),
 ('CSI 312 C', '2020-09-26', 'regular'),
 ('CSI 312 C', '2020-09-27', 'regular'),
 ('CSI 312 C', '2020-09-28', 'regular'),
 ('CSI 312 C', '2020-09-29', 'regular');


INSERT INTO `studentjcourse` (`s_id`, `c_code`) VALUES
 ('11163071', 'CSI 311'),
 ('11172070', 'CSI 311'),
 ('11171327', 'CSI 311'),
 ('11172070', 'CSI 312'),
 ('11163071', 'CSI 312');


INSERT INTO `studentjsection` (`s_id`, `c_code`, `sec_name`) VALUES
 ('11163071', 'CSI 311', 'CSI 311 B'),
 ('11163071', 'CSI 312', 'CSI 312 C'),
 ('11172070', 'CSI 311', 'CSI 311 B'),
 ('11172070', 'CSI 312', 'CSI 312 C'),
 ('11171327', 'CSI 311', 'CSI 311 B');




.............................15.09.20............................



INSERT INTO `course` (`c_code`, `c_name`) VALUES ('CSI 227', 'Algorithms');


INSERT INTO `teacherjcourse` (`t_id`, `c_code`) VALUES ('F01192138', 'CSI 227');

INSERT INTO `section` (`c_code`, `t_id`, `sec_name`, `sec_start_time`, `sec_end_time`, `sec_room_number`, `sec_rfid_reader`, `sec_trimester`) VALUES
 ('CSI 227', 'F01192138', 'CSI 227 C', '00:03:00', '23:00:00', '307', '307r', '202');

INSERT INTO `teacherjcourse` (`t_id`, `c_code`) VALUES ('F01192138', 'CSI 227');


INSERT INTO `studentjcourse` (`s_id`, `c_code`) VALUES
 ('11172070', 'CSI 227'),
 ('11163078', 'CSI 227'),
 ('11163071', 'CSI 227'),
 ('11163075', 'CSI 227'),
 ('11162009', 'CSI 227'),
 ('11171327', 'CSI 227');


INSERT INTO `studentjcourse` (`s_id`, `c_code`) VALUES
 ('11163075', 'CSI 311'),
 ('11162009', 'CSI 311');


INSERT INTO `studentjsection` (`s_id`, `c_code`, `sec_name`) VALUES
 ('11172070', 'CSI 227', 'CSI 227 C'),
 ('11163078', 'CSI 227', 'CSI 227 C'),
 ('11163071', 'CSI 227', 'CSI 227 C'),
 ('11163075', 'CSI 227', 'CSI 227 C'),
 ('11162009', 'CSI 227', 'CSI 227 C'),
 ('11171327', 'CSI 227', 'CSI 227 C'),
 ('11163075', 'CSI 311', 'CSI 311 B'),
 ('11162009', 'CSI 311', 'CSI 311 B');


INSERT INTO `classdate` (`sec_name`, `date`, `class_type`) VALUES
 ('CSI 227 C', '2020-09-14', 'regular'),
 ('CSI 227 C', '2020-09-15', 'regular'),
 ('CSI 227 C', '2020-09-16', 'regular'),
 ('CSI 227 C', '2020-09-17', 'regular'),
 ('CSI 227 C', '2020-09-18', 'regular'),
 ('CSI 227 C', '2020-09-19', 'regular'),
 ('CSI 227 C', '2020-09-20', 'regular'),
 ('CSI 227 C', '2020-09-21', 'regular'),
 ('CSI 227 C', '2020-09-22', 'regular'),
 ('CSI 227 C', '2020-09-23', 'make up'),
 ('CSI 227 C', '2020-09-24', 'regular'),
 ('CSI 227 C', '2020-09-25', 'regular'),
 ('CSI 227 C', '2020-09-26', 'regular');




INSERT INTO `attendance` (`sec_name`, `t_id`, `s_id`, `date`, `time`) VALUES
 ('CSI 227 C', 'F01192138', '11172070', '2020-09-14', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11163078', '2020-09-14', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11163071', '2020-09-14', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11163075', '2020-09-14', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11162009', '2020-09-14', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11171327', '2020-09-14', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11172070', '2020-09-15', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11163078', '2020-09-15', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11163071', '2020-09-15', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11163075', '2020-09-15', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11162009', '2020-09-15', current_timestamp()),
 ('CSI 227 C', 'F01192138', '11171327', '2020-09-15', current_timestamp());



INSERT INTO `attendance` (`sec_name`, `t_id`, `s_id`, `date`, `time`) VALUES
 ('CSI 311 B', 'F01192138', '11163078', '2020-09-14', current_timestamp()),
 ('CSI 311 B', 'F01192138', '11163075', '2020-09-14', current_timestamp()),
 ('CSI 311 B', 'F01192138', '11162009', '2020-09-14', current_timestamp()),
 ('CSI 311 B', 'F01192138', '11163078', '2020-09-15', current_timestamp()),
 ('CSI 311 B', 'F01192138', '11163075', '2020-09-15', current_timestamp()),
 ('CSI 311 B', 'F01192138', '11162009', '2020-09-15', current_timestamp());