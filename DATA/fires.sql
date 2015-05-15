CREATE TABLE fires
(
	fyear CHAR(4) NOT NULL,
	fdate VARCHAR(20) NOT NULL,
	fire VARCHAR(30) NOT NULL,
	location VARCHAR(30) NOT NULL,
	nos VARCHAR(5) NOT NULL,
	class VARCHAR(4) NOT NULL,
	fireid MEDIUMINT(10) NOT NULL AUTO_INCREMENT,
	UNIQUE fireid (fireid)
)

INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002', '05/31-06/10', 'Arrowhead', 'BDF','10','F');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002', '06/26-06/29','Louisiana','BDF','4','G');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','10/21','Charlie','BDF','1','B');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','11/04','Quartz','BDF','1','B');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','07/14','Hook','BDF','1','B');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','07/17-07/18','Vista','BDF','2','C');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','08/10-08/24','NcNally','SQF','14','G');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','07/13','Crab','BDF','1','B');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','08/29-09/11','Lytle','BDF','14','E');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','09/15-09/16','Thurman','BDF','2','B');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','06/16-06/26','Blue Cut','BDF','11','G');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','09/25','Ridge','BDF','1','B');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','10/07','Hornet','BDF','1','A');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','10/13-10/14','Cold','BDF','2','A');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','07/12-07/13','Creek','BDF','1.5','B');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','10/24-10/25','Harrison','BDF','2','C');
INSERT INTO fires (fyear, fdate, fire, location, class) VALUES ('2002','07/23-08/07','McNally','SQF','14','G');

