-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2023 lúc 04:01 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webkhoahoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `subject_id` varchar(5) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_image` varchar(100) NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_des` text NOT NULL,
  `couses_status` tinyint(1) NOT NULL,
  `couses_grade` varchar(20) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`course_id`, `subject_id`, `course_name`, `course_image`, `course_price`, `course_des`, `couses_status`, `couses_grade`, `created_at`, `update_at`) VALUES
(1, 'anh', 'TIẾNG ANH - LỚP 11', 'model\\anh\\anh', 1000000, 'Môn Tiếng Anh (English) là một ngành học tập trung vào việc nghiên cứu ngôn ngữ tiếng Anh, cũng như kỹ năng nghe, nói, đọc và viết trong tiếng Anh. Tiếng Anh được coi là ngôn ngữ toàn cầu và được sử dụng rộng rãi trên khắp thế giới trong giao tiếp quốc tế, kinh doanh, giáo dục, và nhiều lĩnh vực khác.\r\n\r\nMôn học Tiếng Anh giúp sinh viên phát triển khả năng giao tiếp hiệu quả bằng tiếng Anh. Chương trình học bao gồm việc học từ vựng, ngữ pháp, nghe hiểu, phản xạ nhanh và giao tiếp tự tin trong tiếng Anh. Sinh viên được đào tạo để hiểu và sử dụng ngôn ngữ tiếng Anh một cách chính xác và linh hoạt.', 1, 'Lớp 11', '2023-12-06', '2023-12-06'),
(2, 'dia', 'Địa Lý', 'model\\anh\\dia', 1000000, 'Môn Địa lý (Geography) là một ngành học nghiên cứu về môi trường và sự tương tác giữa con người và môi trường xung quanh. Nó tập trung vào nghiên cứu về địa hình, khí hậu, tài nguyên, dân số, văn hóa, và các yếu tố khác ảnh hưởng đến sự phân bố và biến đổi của các hệ thống địa lý trên Trái Đất.\r\n\r\nMôn học Địa lý có hai lĩnh vực chính là địa lý vật lý và địa lý nhân khẩu. Địa lý vật lý tập trung vào nghiên cứu về địa hình, khí hậu, thực vật và động vật, tài nguyên tự nhiên, và các hiện tượng tự nhiên khác trên Trái Đất. Địa lý nhân khẩu tập trung vào nghiên cứu về dân số, tầng lớp xã', 1, 'Lớp 10', '2023-12-06', '2023-12-06'),
(3, 'hoa', 'Hóa Học - 12', 'model\\anh\\hoa', 20000000, 'Môn hóa học là một ngành khoa học tự nhiên tập trung vào việc nghiên cứu thành phần, cấu trúc, tính chất và biến đổi của các chất. Nó liên quan chặt chẽ đến sự hiểu biết về các nguyên tử, phân tử, tương tác và các quá trình hóa học trong tự nhiên và các hệ thống nhân tạo.\r\n\r\nHóa học được chia thành nhiều lĩnh vực khác nhau như hóa hữu cơ, hóa vô cơ, hóa lý, hóa phân tích và hóa sinh. Mỗi lĩnh vực này tập trung vào các khía cạnh cụ thể của hóa học và có ứng dụng rộng rãi trong nhiều lĩnh vực khác nhau.', 1, 'Lớp 12', '2023-12-06', '2023-12-06'),
(4, 'sinh', 'Sinh học - 11', 'model\\anh\\sinh', 3000000, 'Môn Sinh học (Biology) là một ngành khoa học nghiên cứu về sự sống và các hệ thống sống trên Trái Đất. Nó tập trung vào nghiên cứu về cấu trúc, chức năng, phát triển, nguồn gốc, và tương tác của các hình thái sống như các sinh vật, động vật, thực vật, vi khuẩn, và vi rút.\r\n\r\nMôn học Sinh học bao gồm nhiều lĩnh vực chuyên ngành như vi sinh vật học, di truyền học, sinh thái học, sinh lý học, và sinh vật học phân tử. Sinh viên học về cấu trúc và chức năng của các bộ phận cơ thể, quá trình trao đổi chất, di truyền và biến dị, tương tác sinh vật với môi trường, và các khía cạnh khác liên quan đến sự sống.', 1, 'Lớp 11', '2023-12-06', '2023-12-06'),
(5, 'to', 'TOÁN HỌC - 11', 'model\\anh\\toan', 30000000, 'Môn Toán là một ngành học chuyên về các khái niệm, quy tắc và phương pháp để nghiên cứu và giải quyết các vấn đề liên quan đến số, hình học, đại số, lượng giác, xác suất, thống kê và các lĩnh vực khác. Nó là một ngành khoa học cơ bản và có vai trò quan trọng trong nền tảng của nhiều lĩnh vực khác nhau như khoa học tự nhiên, kỹ thuật, kinh tế, tin học, và nhiều lĩnh vực khác.\r\n\r\nMôn Toán cung cấp cho chúng ta các công cụ và phương pháp để phân tích, đo lường, và mô hình hóa các hiện tượng và quy luật trong thế giới thực. Nó giúp chúng ta phát triển tư duy logic, khả năng tư duy sáng tạo, và kỹ năng giải quyết vấn đề. ', 1, 'Lớp 10', '2023-12-06', '2023-12-06'),
(6, 'van', 'Ngữ Văn - 12', 'model\\anh\\van', 5000000, 'Môn Ngữ văn là một ngành học liên quan đến việc nghiên cứu và hiểu về ngôn ngữ, văn học và nghệ thuật văn bản. Nó tập trung vào việc phân tích, giải thích và đánh giá các tác phẩm văn học, bao gồm cả các tác phẩm văn học cổ điển và đương đại. Môn học này khám phá sự ảnh hưởng của ngôn ngữ và văn bản đến ý nghĩa, cảm xúc và tư duy của con người.\r\n\r\nMôn Ngữ văn giúp chúng ta phát triển khả năng đọc hiểu sâu sắc, phân tích và phê phán văn bản. Nó khuyến khích sự sáng tạo trong việc sử dụng ngôn ngữ và khám phá cách thức mà tác giả sử dụng từ ngữ, câu trúc và phong cách để truyền đạt ý nghĩa và tạo ra hiệu ứng nghệ thuật.', 1, 'Lớp 12', '2023-12-06', '2023-12-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses_lessons`
--

CREATE TABLE `courses_lessons` (
  `courses_lessons_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `courses_lessons`
--

INSERT INTO `courses_lessons` (`courses_lessons_id`, `course_id`, `lesson_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` varchar(100) NOT NULL,
  `lesson_des` text NOT NULL,
  `lesson_video` varchar(100) NOT NULL,
  `lesson_status` tinyint(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `lesson_name`, `lesson_des`, `lesson_video`, `lesson_status`, `created_at`, `updated_at`) VALUES
(1, 'Unit 1: A long and healthy life', 'I. Getting Started \r\nII. Language \r\nIII. Reading \r\nIV. Speaking \r\nV. Listening \r\nVI. Writing\r\nVII. Communication and Culture \r\nVIII. Looking Back \r\n', 'https://www.youtube.com/watch?v=bqkDC8K3occ', 1, '2023-12-06', '2023-12-06'),
(2, 'Bài 1: Sự khác biệt về trình độ phát triển kinh tế - xã hội của các nhóm nước', 'I. Các nhóm nước\r\nII. Sự khác biệt về kinh tế - xã hội của các nhóm nước', 'https://www.youtube.com/watch?v=ckXrjfOvJEQ', 1, '2023-12-06', '2023-12-06'),
(3, 'Bài 1: Khái niệm về cân bằng hóa học', 'i. Phản ứng một chiều, phản ứng thuận nghịch và cân bằng hóa học\r\nii. Hằng số cân bằng của phản ứng thuận nghịch', 'https://www.youtube.com/watch?v=ckXrjfOvJEQ', 1, '2023-12-06', '2023-12-06'),
(4, 'Bài 1: Khái quát về trao đổi chất và chuyển hóa năng lượng', 'Dừng lại và suy ngẫm\r\nLuyện tập và vận dụng', 'https://www.youtube.com/watch?v=ckXrjfOvJEQ', 1, '2023-12-06', '2023-12-06'),
(5, 'Bài 1: Góc lượng giác. Giá trị lượng giác của góc lượng giác sách ', 'I. Góc lượng giác\r\nII. Giá trị lượng giác của góc lượng giác', 'https://www.youtube.com/watch?v=ckXrjfOvJEQ', 1, '2023-12-06', '2023-12-06'),
(6, 'Khái quát văn học Việt Nam từ đầu cách mạng tháng tám 1945 đến thế kỉ XX', 'i. Những nét chính về tình hình lịch sử, xã hội, văn hóa có ảnh hưởng tới tình hình phát triển của văn học Việt Nam\r\nii. Văn học từ 1945 – 1975\r\n', 'https://www.youtube.com/watch?v=ckXrjfOvJEQ', 1, '2023-12-06', '2023-12-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` varchar(5) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_des`) VALUES
('anh', 'Tiếng Anh', 'Môn Tiếng Anh (English) là một ngành học tập trung vào việc nghiên cứu ngôn ngữ tiếng Anh, cũng như kỹ năng nghe, nói, đọc và viết trong tiếng Anh. Tiếng Anh được coi là ngôn ngữ toàn cầu và được sử dụng rộng rãi trên khắp thế giới trong giao tiếp quốc tế, kinh doanh, giáo dục, và nhiều lĩnh vực khác.\n\nMôn học Tiếng Anh giúp sinh viên phát triển khả năng giao tiếp hiệu quả bằng tiếng Anh. Chương trình học bao gồm việc học từ vựng, ngữ pháp, nghe hiểu, phản xạ nhanh và giao tiếp tự tin trong tiếng Anh. Sinh viên được đào tạo để hiểu và sử dụng ngôn ngữ tiếng Anh một cách chính xác và linh hoạt.'),
('dia', 'Địa Lý', 'Môn Địa lý (Geography) là một ngành học nghiên cứu về môi trường và sự tương tác giữa con người và môi trường xung quanh. Nó tập trung vào nghiên cứu về địa hình, khí hậu, tài nguyên, dân số, văn hóa, và các yếu tố khác ảnh hưởng đến sự phân bố và biến đổi của các hệ thống địa lý trên Trái Đất.\n\nMôn học Địa lý có hai lĩnh vực chính là địa lý vật lý và địa lý nhân khẩu. Địa lý vật lý tập trung vào nghiên cứu về địa hình, khí hậu, thực vật và động vật, tài nguyên tự nhiên, và các hiện tượng tự nhiên khác trên Trái Đất. Địa lý nhân khẩu tập trung vào nghiên cứu về dân số, tầng lớp xã'),
('hoa', 'Hóa Học', 'Môn hóa học là một ngành khoa học tự nhiên tập trung vào việc nghiên cứu thành phần, cấu trúc, tính chất và biến đổi của các chất. Nó liên quan chặt chẽ đến sự hiểu biết về các nguyên tử, phân tử, tương tác và các quá trình hóa học trong tự nhiên và các hệ thống nhân tạo.\n\nHóa học được chia thành nhiều lĩnh vực khác nhau như hóa hữu cơ, hóa vô cơ, hóa lý, hóa phân tích và hóa sinh. Mỗi lĩnh vực này tập trung vào các khía cạnh cụ thể của hóa học và có ứng dụng rộng rãi trong nhiều lĩnh vực khác nhau.'),
('sinh', 'Sinh Học', 'Môn Sinh học (Biology) là một ngành khoa học nghiên cứu về sự sống và các hệ thống sống trên Trái Đất. Nó tập trung vào nghiên cứu về cấu trúc, chức năng, phát triển, nguồn gốc, và tương tác của các hình thái sống như các sinh vật, động vật, thực vật, vi khuẩn, và vi rút.\n\nMôn học Sinh học bao gồm nhiều lĩnh vực chuyên ngành như vi sinh vật học, di truyền học, sinh thái học, sinh lý học, và sinh vật học phân tử. Sinh viên học về cấu trúc và chức năng của các bộ phận cơ thể, quá trình trao đổi chất, di truyền và biến dị, tương tác sinh vật với môi trường, và các khía cạnh khác liên quan đến sự sống.'),
('to', 'Toán', 'Môn Toán là một ngành học chuyên về các khái niệm, quy tắc và phương pháp để nghiên cứu và giải quyết các vấn đề liên quan đến số, hình học, đại số, lượng giác, xác suất, thống kê và các lĩnh vực khác. Nó là một ngành khoa học cơ bản và có vai trò quan trọng trong nền tảng của nhiều lĩnh vực khác nhau như khoa học tự nhiên, kỹ thuật, kinh tế, tin học, và nhiều lĩnh vực khác.\n\nMôn Toán cung cấp cho chúng ta các công cụ và phương pháp để phân tích, đo lường, và mô hình hóa các hiện tượng và quy luật trong thế giới thực. Nó giúp chúng ta phát triển tư duy logic, khả năng tư duy sáng tạo, và kỹ năng giải quyết vấn đề. '),
('van', 'Ngữ Văn', 'Môn Ngữ văn là một ngành học liên quan đến việc nghiên cứu và hiểu về ngôn ngữ, văn học và nghệ thuật văn bản. Nó tập trung vào việc phân tích, giải thích và đánh giá các tác phẩm văn học, bao gồm cả các tác phẩm văn học cổ điển và đương đại. Môn học này khám phá sự ảnh hưởng của ngôn ngữ và văn bản đến ý nghĩa, cảm xúc và tư duy của con người.\n\nMôn Ngữ văn giúp chúng ta phát triển khả năng đọc hiểu sâu sắc, phân tích và phê phán văn bản. Nó khuyến khích sự sáng tạo trong việc sử dụng ngôn ngữ và khám phá cách thức mà tác giả sử dụng từ ngữ, câu trúc và phong cách để truyền đạt ý nghĩa và tạo ra hiệu ứng nghệ thuật.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` varchar(5) NOT NULL,
  `subject_id` varchar(5) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teach_dob` date NOT NULL,
  `teacher_address` varchar(100) NOT NULL,
  `teacher_mail` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `subject_id`, `teacher_name`, `teach_dob`, `teacher_address`, `teacher_mail`, `created_at`, `updated_at`) VALUES
('anh1', 'anh', 'Hà Văn J', '2015-12-10', 'Hà Nội', 'hvj@gmail.com', '2023-12-06', '2023-12-06'),
('dia1', 'dia', 'Nguyễn Văn K', '2015-12-17', 'Hà Nội', 'nvk@gmail.com', '2023-12-06', '2023-12-06'),
('hoa1', 'hoa', 'Bùi Văn B', '2015-12-09', 'Nam Từ Liêm, Hà Nội', 'bvb@gmail.com', '2023-12-06', '2023-12-06'),
('sinh1', 'sinh', 'Hà Văn D', '2014-12-11', 'Nguyễn Văn F', 'nvf@gmail.com', '2023-12-06', '2023-12-06'),
('toan1', 'to', 'Đinh Văn B', '2021-12-08', 'Cầu Giấy, Hà Nội', 'dvb@gmail.com', '2023-12-06', '2023-12-06'),
('van1', 'van', 'Nguyễn Thị A', '2014-12-11', 'Hoàn Kiếm, Hà Nội', 'nta@gmail.com', '2023-12-06', '2023-12-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `use_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_dob` date NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_role` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`use_id`, `user_name`, `user_pass`, `user_dob`, `user_address`, `user_mail`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2017-12-06', 'Hà Nội', 'admin@gmail.com', 1, '2023-12-06', '2023-12-06'),
(2, 'nhom05', 'nhom05', '2016-12-02', 'Hà Nội', 'nhom5@gmail.com', 0, '2023-12-06', '2023-12-06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `_course_id_subject` (`subject_id`);

--
-- Chỉ mục cho bảng `courses_lessons`
--
ALTER TABLE `courses_lessons`
  ADD PRIMARY KEY (`courses_lessons_id`),
  ADD KEY `_course_id` (`course_id`),
  ADD KEY `_lesson_id` (`lesson_id`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `_subject_id_teacher` (`subject_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`use_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `courses_lessons`
--
ALTER TABLE `courses_lessons`
  MODIFY `courses_lessons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `_course_id_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `courses_lessons`
--
ALTER TABLE `courses_lessons`
  ADD CONSTRAINT `_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `_lesson_id` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `_subject_id_teacher` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
