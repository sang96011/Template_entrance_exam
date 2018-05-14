CREATE TABLE users (
  username NVARCHAR(255) NOT NULL primary key,
  password NVARCHAR(255) NOT NULL,
  email NVARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO users(username,password, email) VALUES
	(N'admin',N'12345678',N'admin@gmail.com');

CREATE TABLE subjects (
	subject_id INT(25) NOT NULL primary key,
	subject_name NVARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO subjects(subject_id,subject_name) VALUES
	(1,N'Toán'),
	(2,N'Vật lí'),
	(3,N'Hóa học');

/*CREATE TABLE tests (
	test_id INT(25) NOT NULL primary key,
	test_name NVARCHAR(255) NOT NULL,
	subject_id INT(25) NOT NULL,
	CONSTRAINT fk_tests_subjects FOREIGN KEY(subject_id) REFERENCES subjects(subject_id) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tests(test_id, test_name,subject_id) VALUES
	(1,N'Đề thi số 1',1),
	(2,N'Đề thi số 2',1),
	(3,N'Đề thi số 3',1),
	(4,N'Đề thi số 1',2),
	(5,N'Đề thi số 2',2),
	(6,N'Đề thi số 3',2),
	(7,N'Đề thi số 1',3),
	(8,N'Đề thi số 2',3),
	(9,N'Đề thi số 3',3);
*/	
CREATE TABLE answers (
	answer_id INT(25) NOT NULL primary key,
	answer_name VARCHAR(20) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO answers(answer_id, answer_name) VALUES
	(1,"A"),
	(2,"B"),
	(3,"C"),
	(4,"D");

CREATE TABLE questions (
	question_id INT(25) NOT NULL primary key,
	subject_id INT(25) NOT NULL,
	question_name NVARCHAR(500) NOT NULL,
	choice1 NVARCHAR(255) NOT NULL,
	choice2 NVARCHAR(255) NOT NULL,
	choice3 NVARCHAR(255) NOT NULL,
	choice4 NVARCHAR(255) NOT NULL,
	answer_name NVARCHAR(20) NOT NULL,
	#test_id INT(25) NOT NULL,
	CONSTRAINT fk_questions_subjects FOREIGN KEY(subject_id) REFERENCES subjects(subject_id) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO questions(question_id,subject_id, question_name, choice1, choice2, choice3, choice4, answer_name) VALUES
	(1,1, N'Trong không gian Oxyz,cho điểm A(3;-1;1). Hình chiếu vuông góc của A trên mặt phẳng (Oyz) là điểm','M(3;0;0)','N(0;-1;1)','P(0;-1;0)','Q(0;0;1)','B'),
	(2,1, N'Thể tích của khối chóp có chiều cao bằng h và diện tích đáy bằng B là','V = 1/3Bh','V = 1/6Bh','V = Bh','V = 1/2Bh','A'),
	(3,1, N'Trong không gian Oxyz, cho hai điểm A(-1;2;1) và B(2;1;0). Mặt phẳng qua A và vuông góc với AB có phương trình là','3x-y-z-6=0','3x-y-z+6=0','x+3y+z-5=0','x+3y+z-6=0','B'),
	(4,1, N'Một hộp chứa 11 quả cầu gồm 5 quả cầu màu xanh và 6 quả cầu màu đỏ. Chọn ngẫu nhiên đồng thời 2 quả cầu từ hộp đó. Xác suất để 2 quả cầu chọn ra cùng màu bằng','5/22','6/11','5/11','8/11','C'),
	(5,1, N'Một người gửi 100 triệu đồng vào một ngân hàng với lãi suất 0,4% /tháng. Biết rằng nếu không rút tiền ra khỏi ngân hàng thì cứ sau mỗi tháng, số tiền lãi sẽ được nhập vào vốn ban đầu để tính lãi cho tháng tiếp theo. Hỏi sau đúng 6 tháng, người đó được lĩnh số tiền (cả vốn ban đầu và lãi) gần nhất với số tiền nào dưới đây, nếu trong khoảng thời gian này người đó không rút tiền ra và lãi suất không thay đổi?',N'102.424.000 đồng',N'102.423.000 đồng',N'102.016.000 đồng',N'102.017.000 đồng','A'),
	(6,1, N'Cho tứ diện OABC có OA, OB, OC đôi một vuông góc với nhau và OA=OB=OC. Gọi M là trung điểm của BC. Góc giữa hai đường thẳng OM và AB bằng',N'90 độ',N'30 độ',N'60 độ',N'45 độ','C'),
	(7,1, N'Gọi S là tập hợp tất cả các giá trị của tham số thực m sao cho giá trị lớn nhất của hàm số y=|x^3-3x+m| trên đoạn [0;2] bằng 3. Số phần tử của S là','1','2','0','6','B'),
	(8,1, N'Cho số phức z=a+bi (a,b thuộc R) thỏa mãn z+2+i-|z|(1+i)=0 và z>1. Tính P=a+b','P = -1','P = -5','P = 3','P = 7','D'),
	(9,1, N'Cho hai hình vuông ABCD và ABEF có cạnh bằng 1, lần lượt nằm trên hai mặt phẳng vuông góc với nhau. Gọi S là điểm đối xứng với B qua đường thẳng DE. Thể tích của khối đa diện ABCDSEF bằng','7/6','11/12','2/3','5/6','D'),
	(10,1, N'Trong không gian Oxyz, cho ba điểm A(1;2;1), B(3;-1;1) và C(-1;-1;1). Gọi (S1) là mặt cầu có tâm A, bán kính bằng 2; (S2) và (S3) là hai mặt cầu có tâm lần lượt là B, C và bán kính đều bằng 1. Hỏi có bao nhiêu mặt phẳng tiếp xúc với cả ba mặt cầu (S1), (S2), (S3)?','5','7','6','8','C'),
	(11,1, N'Xếp ngẫu nhiên 10 học sinh gồm 2 học sinh lớp 12A, 3 học sinh lớp 12B và 5 học sinh lớp 12C thành một hàng ngang. Xác suất để trong 10 học sinh trên không có 2 học sinh cùng lớp đứng cạnh nhau bằng','11/630','1/126','1/105','1/42','A'),
	(21,2, N'Dao động cơ tắt dần',N'có biên độ tăng dần theo thời gian.',N'luôn có hại.',N'có biên độ giảm dần theo thời gian.',N'luôn có lợi.','C'),
	(22,2, N'Nguyên tắc hoạt động của máy phát điện xoay chiều dựa trên hiện tượng',N'quang điện trong',N'quang điện ngoài',N'cộng hưởng điện',N'cảm ứng điện từ','D'),
	(23,2, N'Trong thông tin liên lạc bằng sóng vô tuyến, mạch khuếch đại có tác dụng',N'tăng bước sóng của tín hiệu.',N'tăng tần số của tín hiệu.',N'tăng chu kì của tín hiệu.',N'tăng cường độ của tín hiệu.','D'),
	(24,2, N'Chất nào sau đây phát ra quang phổ vạch phát xạ?',N'Chất lỏng bị nung nóng',N'Chất khí ở áp suất lớn bị nung nóng.',N'Chất rắn bị nung nóng',N'Chất khí nóng sáng ở áp suất thấp.','D'),
	(25,2, N'Khi chiếu một chùm tia tử ngoại vào một ống nghiệm đựng dung dịch fluorexêin thì thấy dung dịch này phát ra ánh sáng màu lục. Đây là hiện tượng',N'phản xạ ánh sáng.',N'hóa - phát quang.',N'tán sắc ánh sáng',N'quang - phát quang.','D'),
	(26,2, N'Phát biểu nào sau đây đúng? Trong từ trường, cảm ứng từ tại một điểm',N'nằm theo hướng của lực từ.',N'ngược hướng với đường sức từ.',N'nằm theo hướng của đường sức từ.',N'ngược hướng với lực từ.','C'),
	(27,2, N'Một con lắc lò xo gồm lò xo có độ cứng k, vật nhỏ khối lượng 100 g, dao động điều hòa với tần số góc 20 rad/s. Giá trị của k là',N'80 N/m.',N'20 N/m.',N'40 N/m.',N'10 N/m.','C'),
	(28,2, N'Giao thoa ở mặt nước được tạo bởi hai nguồn sóng kết hợp dao động điều hòa cùng pha theo phương thẳng đứng tại hai vị trí S1 và S2. Sóng truyền trên mặt nước có bước sóng 6 cm. Trên đoạn thẳng S1S2, hai điểm gần nhau nhất mà phần tử nước tại đó dao động với biên độ cực đại cách nhau',N'12 cm.',N'6 cm.',N'3 cm.',N'1,5 cm.','C'),
	(29,2, N'Đặt điện áp xoay chiều vào hai đầu đoạn mạch gồm điện trở R và cuộn cảm thuần mắc nối tiếp. Khi đó, cảm kháng của cuộn cảm có giá trị bằng R. Hệ số công suất của đoạn mạch là',N'1.',N'0,5.',N'0,87.',N'0,71.','D'),
	(30,2, N'Trong thí nghiệm Y-âng về giao thoa ánh sáng, khoảng cách giữa hai khe là 0,5 mm, khoảng cách từ mặt phẳng chứa hai khe đến màn quan sát là 2 m. Chiếu sáng các khe bằng bức xạ có bước sóng 500 nm. Trên màn, khoảng cách giữa hai vân sáng liên tiếp là',N'0,5 mm.',N'1 mm.',N'4 mm.',N'2 mm.','D'),
	(31,3, N'Giả sử hai hạt nhân X và Y có độ hụt khối bằng nhau, nếu số nuclôn của hạt nhân X lớn hơn số nuclôn của hạt nhân Y thì',N'năng lượng liên kết của hạt nhân Y lớn hơn năng lượng liên kết của hạt nhân X.',N'hạt nhân X bền vững hơn hạt nhân Y.',N'. năng lượng liên kết của hạt nhân X lớn hơn năng lượng liên kết của hạt nhân Y.',N'hạt nhân Y bền vững hơn hạt nhân X.','D'),
	(32,3, N'Một sợi dây dài 2 m với hai đầu cố định, đang có sóng dừng. Sóng truyền trên dây với tốc độ 20 m/s. Biết rằng tần số của sóng truyền trên dây có giá trị trong khoảng từ 11 Hz đến 19 Hz. Tính cả hai đầu dây, số nút sóng trên dây là',N'5.',N'3.',N'4.',N'2.','C'),
	(33,3, N'Trong giờ thực hành, để đo tiêu cự f của một thấu kính hội tụ, một học sinh dùng một vật sáng phẳng nhỏ AB và một màn ảnh. Đặt vật sáng song song với màn và cách màn ảnh một khoảng 90 cm. Dịch chuyển thấu kính dọc trục chính trong khoảng giữa vật và màn thì thấy có hai vị trí thấu kính cho ảnh rõ nét của vật trên màn, hai vị trí này cách nhau một khoảng 30 cm. Giá trị của f là',N'15 cm.',N'40 cm.',N'20 cm.',N'30 cm.','C'),
	(34,3, N'Ở mặt nước, tại hai điểm A và B có hai nguồn kết hợp dao động cùng pha theo phương thẳng đứng. ABCD là hình vuông nằm ngang. Biết trên CD có 3 vị trí mà ở đó các phần tử dao động với biên độ cực đại. Trên AB có tối đa bao nhiêu vị trí mà phần tử ở đó dao động với biên độ cực đại?',N'13.',N'7.',N'11.',N'9.','D'),
	(35,3, N'Một sợi dây đàn hồi căng ngang với đầu A cố định đang có sóng dừng. B là phần tử dây tại điểm bụng thứ hai tính từ đầu A, C là phần tử dây nằm giữa A và B. Biết A cách vị trí cân bằng của B và vị trí cân bằng của C những khoảng lần lượt là 30 cm và 5 cm, tốc độ truyền sóng trên dây là 50 cm/s. Trong quá trình dao động điều hoà, khoảng thời gian ngắn nhất giữa hai lần li độ của B có giá trị bằng biên độ dao động của C là', '1/15 s', '2/5 s', '2/15 s', '1/5 s','D'),
	(36,3, N' Hạt nhân X phóng xạ biến đổi thành hạt nhân bền Y. Ban đầu (t = 0), có một mẫu chất X nguyên chất. Tại thời điểm t1 và t2, tỉ số giữa số hạt nhân Y và số hạt nhân X ở trong mẫu tương ứng là 2 và 3. Tại thời điểm t3 = 2t1 + 3t2, tỉ số đó là','17','575','107','72','B');


CREATE TABLE parts(
part_id INT(25) NOT NULL primary key,
part_name NVARCHAR(255) NOT NULL,
subject_id INT(25) NOT NULL,
CONSTRAINT fk_parts_subjects FOREIGN KEY(subject_id) REFERENCES subjects(subject_id) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO parts(part_id, part_name, subject_id) VALUES
	(1,N'Phần 1. Hàm số',1),
	(2,N'Phần 2. Hàm số mũ - logarit',1),
	(3,N'Phần 3. Nguyên hàm - tích phân',1),
	(4,N'Phần 4. Lượng giác',1),
	(5,N'Phần 5. Số phức',1),
	(6,N'Phần 6. Tổ hợp xác suất',1),
	(7,N'Phần 7. Hình học không gian',1),
	(8,N'Phần 8. Hình học giải tích trong không gian',1),
	(9,N'Phần 9. Hệ phương trình',1),
	(10,N'Phần 10. Giá trị lớn nhất - giá trị nhỏ nhất',1),
	(11,N'Phần 1. Dao động điều hòa',2),
	(12,N'Phần 2. Sóng cơ học',2),
	(13,N'Phần 3. Dòng điện xoay chiều',2),
	(14,N'Phần 4. Dao động và sóng điện từ',2),
	(15,N'Phần 5. Sóng ánh sáng',2),
	(16, N'Phần 6. Lượng tử ánh sáng', 2),
	(17,N'Phần 7. Hạt nhân nguyên tử',2),
	(18,N'Phần 1. Este - Lipit',3),
	(19,N'Phần 2. Cacbonhidrat',3),
	(20,N'Phần 3. Amin - Aminoaxit - Protein - Polyme',3),
	(21,N'Phần 4. Đại cương về kim loại',3),
	(22,N'Phần 5. Kim loại kiềm và kim loại kiềm thổ',3),
	(23,N'Phần 6. Nhôm và Crôm',3),
	(24,N'Phần 7. Sắt và một số kim loại quan trọng',3),
	(25,N'Phần 8. Nhận biết một số chất vô cơ',3);
	

CREATE TABLE videos (
	video_id INT(25) NOT NULL primary key,
	video_name NVARCHAR(255) NOT NULL,
	part_id INT(25) NOT NULL,
	href VARCHAR(255),
	tlbg VARCHAR(255),
	bttl VARCHAR(255),
	dabttl VARCHAR(255),
	CONSTRAINT fk_videos_parts FOREIGN KEY(part_id) REFERENCES parts(part_id) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO videos(video_id, video_name, part_id, href, tlbg, bttl,dabttl) VALUES
	(1, N'Khoảng đồng biến, nghịch biến của hàm số (P1)', 1,'videos/Khoang db, nb cua HS(P1).mp4','documents/TLBG khoang dong bien nghich bien.pdf','documents/BTTL khoang dong bien nghich bien.pdf','documents/DABTTL khoang dong bien nghich bien.pdf'),
	(2, N'Khoảng đồng biến, nghịch biến của hàm số (P2)', 1,'videos/Khoang db, nb cua HS(P2).mp4','documents/TLBG khoang dong bien nghich bien 2.pdf','documents/BTTL khoang dong bien nghich bien 2.pdf','documents/DABTTL khoang dong bien nghich bien 2.pdf'),
	(3, N'Cực trị của hàm số (P1)',1,'videos/Cuc tri cua HS(P2).mp4','documents/TLBG cuc tri cua ham so 1.pdf','documents/BTTL cuc tri cua ham so 1.pdf','documents/DABTTL cuc tri cua ham so 1.pdf'),
	(4, N'Cực trị của hàm số (P1)',1,'videos/Cuc tri cua HS(P2).mp4','documents/TLBG cuc tri cua ham so 1.pdf','documents/BTTL cuc tri cua ham so 1.pdf','documents/DABTTL cuc tri cua ham so 1.pdf'),	
	(5, N'Khảo sát hàm số bậc ba', 1,'videos/KSHS bac ba.mp4','documents/TLBG khao sat HS bac 3.pdf','documents/BTTL khao sat HS bac 3.pdf','documents/DABTTL khao sat HS bac 3.pdf'),
	(6, N'Khảo sát hàm số bậc nhất trên bậc nhất', 1,'videos/KSHS bac mhat tren bac nhat.mp4','documents/TLBG khao sat HS bac nhat.pdf','documents/BTTL khao sat HS bac nhat.pdf','documents/DABTTL khao sat HS bac nhat.pdf'),
	(7, N'Khảo sát hàm số bậc hai trên bậc nhất', 1,'videos/KSHS bac hai tren bac nhat.mp4','documents/TLBG khao sat HS bac hai tren bac nhat.pdf','documents/BTTL khao sat HS bac hai tren bac nhat.pdf','documents/DABTTL khao sat HS bac hai tren bac nhat.pdf'),
	(8, N'Lũy thừa',2,'#','#','#','#'),
	(9, N'Logarit',2,'#','#','#','#'),
	(10, N'Hàm số mũ, hàm số logarit',2,'#','#','#','#'),
	(11, N'Phương trình mũ và logarit',2,'#','#','#','#'),
	(12, N'Bất phương trình logarit',2,'#','#','#','#'),
	(13, N'Hệ phương trình logarit',2,'#','#','#','#'),
	(14, N'Nguyên hàm',3,'#','#','#','#'),
	(15, N'Tích phân xác định',3,'#','#','#','#');
	

CREATE TABLE exams (
	exam_id INT(25) NOT NULL primary key,
	exam_name NVARCHAR(255) NOT NULL,
	subject_id INT(25) NOT NULL,
	href VARCHAR(255) NOT NULL,
	CONSTRAINT fk_exams_subjects FOREIGN KEY(subject_id) REFERENCES subjects(subject_id) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO exams(exam_id, exam_name, subject_id, href) VALUES
	(1, N'Đề thi minh họa môn Toán kỳ thi THPT Quốc gia 2018', 1, 'exams/De thi minh hoa mon Toan 2018.pdf'),
	(2, N'Đề thi thử THPT Quốc gia môn Toán THPT Chuyên ĐH Vinh 2018', 1, 'exams/De thi thu THPT Quoc gia 2018 mon Toan THPT Chuyen DH Vinh.pdf'),
	(3, N'Đề thi thử THPT Quốc gia môn Toán THPT Chuyên Quốc học Huế 2018', 1, 'exams/De thi thu THPT Quoc gia 2018 mon Toan THPT Chuyen Quoc hoc Hue.pdf'),
	(4, N'Đề thi thử THPT Quốc gia môn Toán THPT Chuyên Sư Phạm Hà Nội 2018', 1, 'exams/De thi thu THPT Quoc Gia 2018 mon Toan THPT Chuyen Su Pham Ha Noi.pdf'),
	(5, N'Đề thi thử THPT Quốc gia môn Toán THPT Chuyên Phan Bội Châu - Nghệ An 2018', 1, 'exams/De thi thu THPT Quoc gia 2018 mon Toan truong THPT chuyen Phan Boi Chau Nghe An.pdf'),
	(6, N'Đề thi THPT Quốc gia môn Toán 2017', 1,'exams/De thi mon Toan 2017.pdf'),
	(7, N'Đề thi THPT Quốc gia môn Toán 2016', 1,'exams/De thi mon Toan 2016.pdf'),
	(8, N'Đề thi THPT Quốc gia môn Toán 2015', 1,'exams/De thi mon Toan 2015.pdf'),
	(9, N'Đề thi minh họa môn Vật Lí kỳ thi THPT quốc gia 2018', 2, 'exams/De thi minh hoa mon Vat li 2018.pdf'),
	(10, N'Đề thi thử THPT Quốc gia môn Vật Lí THPT Chuyên KHTN - Hà Nội 2018', 2, 'exams/De thi thu mon Vat li truong THPT chuyen KHTN - Ha Noi 2018.pdf'),
	(11, N'Đề thi thử THPT Quốc gia môn Vật Lí THPT Chuyên ĐH Vinh 2018', 2, 'exams/De thi thu mon Vat li THPT chuyen DH Vinh 2018.pdf'),
	(12, N'Đề thi thử THPT Quốc gia môn Vật Lí THPT Chuyên Lam Sơn - Thanh Hóa 2018', 2, 'exams/De thi thu THPT Quoc gia 2018 mon Vat Li Truong THPT Chuyen Lam Son Thanh Hoa.pdf'),
	(13, N'Đề thi thử THPT Quốc gia môn Vật Lí THPT Chuyên Sư Phạm Hà Nội 2018', 2, 'exams/De thi thu THPTQG 2018 mon Vat li truong THPT chuyen ĐH Su Pham Ha Noi.pdf'),
	(14, N'Đề thi THPT Quốc gia môn Vật Lí 2017', 2,'exams/De thi mon Vat li 2017.pdf'),
	(15, N'Đề thi THPT Quốc gia môn Vật Lí 2016', 2,'exams/De thi mon Vat li 2016.pdf'),
	(16, N'Đề thi THPT Quốc gia môn Vật Lí 2015', 2,'exams/De thi mon Vat li 2015.pdf'),
	(17, N'Đề thi minh họa môn Hóa Học kỳ thi THPT quốc gia 2018', 3, 'exams/De thi minh hoa mon Hoa Hoc 2018.pdf'),
	(18, N'Đề thi thử THPT Quốc gia môn Hóa Học THPT Chuyên ĐH Vinh 2018', 3, 'exams/De thi thu mon Hoa 2018 Chuyen Dai Hoc Vinh.pdf'),
	(19, N'Đề thi thử THPT Quốc gia môn Hóa học THPT Chuyên Sư Phạm Hà Nội 2018', 3, 'exams/De thi thu mon Hoa 2018 truong THPT Chuyen Su Pham.pdf'),
	(20, N'Đề thi thử THPT Quốc gia môn Hóa Học THPT Chuyên Trần Phú - Hải Phòng 2018', 3, 'exams/De thi thu mon Hoa hoc THPT chuyen Tran Phu - Hai Phong.pdf'),
	(21, N'Đề thi thử THPT Quốc gia môn Hóa Học THPT Chuyên Nguyễn Huệ 2018', 3, 'exams/De thi thu mon Hoa Hoc truong THPT chuyen Nguyen Hue.pdf'),
	(22, N'Đề thi thử THPT Quốc gia môn Hóa Học THPT Chuyên Lam Sơn - Thanh Hóa 2018', 3, 'exams/De thi thu mon Hoa truong THPT Chuyen Lam Son - Thanh Hoa 2018.pdf'),
	(23, N'Đề thi THPT Quốc gia môn Hóa Học 2017', 3,'exams/De thi mon Hoa Hoc 2017.pdf'),
	(24, N'Đề thi THPT Quốc gia môn Hóa Học 2016', 3,'exams/De thi mon Hoa Hoc 2016.pdf'),
	(25, N'Đề thi THPT Quốc gia môn Hóa Học 2015', 3,'exams/De thi mon Hoa Hoc 2015.pdf');


