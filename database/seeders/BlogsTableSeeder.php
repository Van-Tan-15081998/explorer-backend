<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $blogs = [
            [
                'id' => 1, 
                'title' => 'Thời tiết ngày 5-8: Cả nước có mưa và dông', 
                'content' => 'Theo Trung tâm dự báo Khí tượng Thủy văn Quốc gia, ngày 5-8, các khu vực trong cả nước đều có mưa và dông, cục bộ có nơi mưa to, đề phòng khả năng xảy ra lốc, sét, mưa đá và gió giật mạnh.',
            ],
            [
                'id' => 2, 
                'title' => 'Giá vàng hôm nay 5-8: Tăng “phi mã”', 
                'content' => 'Giá vàng thế giới rạng sáng hôm nay (5-8) tăng “phi mã” lên gần mốc 1.800 USD/ounce. Trong nước, giá vàng tăng lên vượt ngưỡng 67 triệu đồng/lượng bán ra.',
            ],
            [
                'id' => 3, 
                'title' => 'Giá xăng dầu hôm nay 5-8: Giảm sâu', 
                'content' => 'Giá dầu trượt dài khỏi mốc 3 con số do lo ngại suy thoái ngày một tăng. Giá dầu Brent chỉ còn ở mức 94,12 USD/thùng và đà lao dốc vẫn chưa dừng.',
            ],
            [
                'id' => 4, 
                'title' => 'Ngày 5-8-1964, Hải quân nhân dân Việt Nam đánh thắng trận đầu', 
                'content' => 'Ngày 5-8-1964, Hải quân nhân dân Việt Nam lần đầu tiên ra quân đối đầu với hải quân và không quân Mỹ đã dũng cảm chiến đấu, đánh đuổi tàu khu trục Maddox ra khỏi vùng biển Việt Nam, bắn rơi 8 máy bay trên vùng biển, vùng trời miền Bắc, làm nên truyền thống “đánh thắng trận đầu” và quyết tâm “dám đánh, quyết đánh và biết đánh thắng” của Quân chủng Hải quân, ghi mốc son lịch sử vào truyền thống “Quyết chiến, quyết thắng” của Quân đội nhân dân Việt Nam anh hùng.',
            ],
            [
                'id' => 5, 
                'title' => 'Các trường quân đội công bố mức điểm nhận hồ sơ xét tuyển đại học, cao đẳng', 
                'content' => 'Ngày 4-8, Ban Tuyển sinh quân sự (Bộ Quốc phòng) đã thông tin mức điểm nhận hồ sơ xét tuyển đại học, cao đẳng quân sự hệ chính quy năm 2022 của 17 học viện, nhà trường quân đội.',
            ],
            [
                'id' => 6, 
                'title' => 'Chủ tịch nước dự lễ trao danh hiệu Anh hùng cho một đơn vị tình báo Công an nhân dân', 
                'content' => 'Ngày 4-8, Bộ Công an tổ chức Lễ đón nhận danh hiệu Anh hùng Lực lượng vũ trang nhân dân thời kỳ đổi mới cho một đơn vị của lực lượng Tình báo Công an nhân dân.',
            ],
            [
                'id' => 7, 
                'title' => 'Toàn quân phát huy phẩm chất Bộ đội Cụ Hồ, kiên quyết chống chủ nghĩa cá nhân', 
                'content' => 'Qua theo dõi, tổng hợp báo cáo cho thấy, 6 tháng đầu năm 2022, cấp ủy, tổ chức đảng các cấp trong toàn quân đã chấp hành nghiêm hướng dẫn của Tổng cục Chính trị QĐND Việt Nam về tổ chức học tập, quán triệt, tuyên truyền, triển khai thực hiện Nghị quyết số 847-NQ/QUTW ngày 28-12-2021 của Quân ủy Trung ương về phát huy phẩm chất Bộ đội Cụ Hồ, kiên quyết chống chủ nghĩa cá nhân trong tình hình mới (Nghị quyết 847).',
            ],
            [
                'id' => 8, 
                'title' => 'Trân trọng giữ gìn những dấu ấn lịch sử', 
                'content' => 'Bảo tàng LLVT miền Đông Nam Bộ (Cục Chính trị, Quân khu 7) tại TP Hồ Chí Minh những ngày này có nhiều khách tham quan hơn thường lệ. Nơi đây đang diễn ra Triển lãm “Uống nước nhớ nguồn, tri ân những người có công với cách mạng”.',
            ],
            [
                'id' => 9, 
                'title' => 'Bảo đảm tốt hậu cần, nâng cao sức mạnh chiến đấu của Lực lượng vũ trang Quân khu 7', 
                'content' => 'Ngày 4-8, Đảng ủy Quân khu 7 tổ chức Hội nghị tổng kết 10 năm thực hiện Nghị quyết số 623 của Quân ủy Trung ương (2012 -2022) và Nghị quyết số 1021 của Đảng ủy Quân khu 7 về công tác hậu cần đến năm 2020 và những năm tiếp theo.',
            ],
            [
                'id' => 10, 
                'title' => 'Quân đoàn 3 triển khai toàn diện, chặt chẽ, hiệu quả công tác tài chính', 
                'content' => 'Chiều 4-8, Đảng ủy Quân đoàn 3 tổ chức hội nghị tổng kết 10 năm thực hiện Nghị quyết số 513-NQ/QUTW ngày 21-9-2012 của Thường vụ Quân ủy Trung ương về công tác tài chính quân đội đến năm 2020 và những năm tiếp theo.',
            ],
            [
                'id' => 11, 
                'title' => 'Vùng 2 Hải quân kịp thời cấp cứu ngư dân bị nạn trên biển', 
                'content' => 'Vào lúc 9 giờ ngày 2-8, Tàu 278 (Vùng 2 Hải quân) đang thực hiện nhiệm vụ tuần tra, kiểm soát, bảo vệ ngư trường trên biển thì nhận được tín hiệu cấp cứu từ tàu cá BV 92662TS có ngư dân gặp nạn trong quá trình đánh bắt thủy sản.',
            ],
            [
                'id' => 12, 
                'title' => 'Xử phạt người đăng TikTok sai sự thật, xúc phạm uy tín của lực lượng Cảnh sát phòng cháy chữa cháy', 
                'content' => 'Ngày 30-7, Công an tỉnh Lâm Đồng cho biết lực lượng chức năng đã mời làm việc đối với H.H.H (chủ tài khoản TikTok “H.H”; sinh năm 1994, trú tại huyện Đức Trọng, tỉnh Lâm Đồng) để làm rõ hành vi cung cấp thông tin sai sự thật trên mạng xã hội.',
            ],
            [
                'id' => 13, 
                'title' => 'Hà Nội: Khuyến cáo người dân cẩn thận trước các cuộc gọi giả danh cán bộ công an', 
                'content' => 'Chiều 20-7, Công an TP Hà Nội thông tin, Công an quận Hà Đông, Hà Nội đang xác minh, điều tra vụ giả danh cán bộ Công an, lừa đảo chiếm đoạt tài sản với số tiền là 160 triệu đồng.',
            ],
            [
                'id' => 14, 
                'title' => 'Các giải bóng đá châu Âu mùa giải mới trở lại từ cuối tuần này', 
                'content' => 'Cuối tuần này sẽ diễn ra vòng 1 thuộc mùa giải mới 2022-2023 của các đấu trường lớn hàng đầu châu Âu như Ngoại hạng Anh, Bundesliga và Ligue 1.',
            ],
            [
                'id' => 15, 
                'title' => 'Đội tuyển U18 nữ Việt Nam giành ngôi á quân giải Đông Nam Á', 
                'content' => 'Tối 4-8, đội tuyển U18 nữ Việt Nam chỉ giành được ngôi á quân tại Giải vô địch U18 nữ Đông Nam Á 2022 khi để thua U18 nữ Australia 0-2 ở chung kết.',
            ],
            [
                'id' => 16, 
                'title' => 'ASEAN Para Games 11: Đoàn thể thao Việt Nam vượt chỉ tiêu đề ra', 
                'content' => 'Đoàn thể thao Việt Nam sớm vượt chỉ tiêu đề ra tại Đại hội thể thao người khuyết tật Đông Nam Á 2022 (ASEAN Para Games 11) khi đã sở hữu 47 huy chương vàng, 42 huy chương bạc và 28 huy chương đồng.',
            ],
            [
                'id' => 17, 
                'title' => 'Lịch thi đấu, trực tiếp vòng 11 V-League 2022: Tâm điểm Hàng Đẫy', 
                'content' => 'Cập nhật lịch thi đấu, lịch trực tiếp vòng 11 Night Wolf V-League 2022 với tâm điểm là cặp đấu Viettel FC-Becamex Bình Dương diễn ra trên sân Hàng Đẫy.',
            ],
            [
                'id' => 18, 
                'title' => 'Món quà ý nghĩa', 
                'content' => 'Tại trụ sở Tổng cục Thể dục thể thao (TDTT), Bộ trưởng Bộ Ngoại giao Hy Lạp Nikolaos Dendias vừa trao tặng số tiền trị giá 50.000 euro, để ủng hộ Chương trình “Vận động viên tài năng trẻ của Việt Nam”.',
            ],
            [
                'id' => 19, 
                'title' => '“Đường đua xanh” lan tỏa phong trào cứu đuối', 
                'content' => 'Có mặt tại bể bơi Bến Bính (TP Hải Phòng) mới đây, chúng tôi bất ngờ khi chứng kiến các học sinh thể hiện kỹ thuật bơi, kỹ năng phòng, chống đuối nước thành thạo tại Giải bơi cứu đuối thanh thiếu nhi toàn quốc “Đường đua xanh” năm 2022.',
            ],
            [
                'id' => 20, 
                'title' => 'U20 Việt Nam nằm ở bảng F, Vòng loại Cúp bóng đá U20 châu Á 2023', 
                'content' => 'Ngày 2-8, Liên đoàn bóng đá châu Á (AFC) công bố lịch thi đấu chính thức Vòng loại Cúp bóng đá U20 châu Á 2023, đội tuyển U20 Việt Nam nằm ở bảng F với các đội Hồng Kông (Trung Quốc), Timor Leste và chủ nhà Indonesia.',
            ],
            [
                'id' => 21,
                'title' => 'Khai mạc Giải vô địch Võ chiến đấu tay không các câu lạc bộ võ thuật toàn quân',
                'content' => 'Ngày 2-8, tại Nhà thi đấu Trung tâm Thể dục Thể thao Quốc phòng 2, Quân khu 7 (TP Hồ Chí Minh), Bộ Tổng Tham mưu Quân đội nhân dân Việt Nam tổ chức khai mạc Giải vô địch Võ chiến đấu tay không các Câu lạc bộ Võ thuật toàn quân năm 2022.',
            ],
            [
                'id' => 22,
                'title' => 'Đội tuyển Pencak silat Việt Nam giành 6 huy chương vàng thế giới',
                'content' => 'Ngày 1-8, tại Malaysia, đội tuyển Pencak silat Việt Nam kết thúc tranh tài Giải Pencak silat vô địch thế giới năm 2022 với thành tích giành 6 huy chương vàng, 4 huy chương bạc và 11 huy chương đồng, xếp hạng 3 chung cuộc.',
            ],
            [
                'id' => 23,
                'title' => 'Nhiều điểm mới tại vòng loại World Cup 2026',
                'content' => 'Liên đoàn Bóng đá châu Á (AFC) vừa đã đăng tải thể thức của vòng loại World Cup 2026 với nhiều điểm mới.',
            ],
            [
                'id' => 24,
                'title' => 'ASEAN Para Games 11: Đội tuyển bơi Việt Nam mở màn với 3 huy chương vàng',
                'content' => 'Đoàn thể thao người khuyết tật Việt Nam đã giành 3 huy chương vàng môn bơi trong buổi sáng 1-8, tại Đại hội thể thao người khuyết tật Đông Nam Á năm 2022 (ASEAN Para Games 11).',
            ],
            [
                'id' => 25,
                'title' => 'Messi và Neymar ghi bàn, PSG đoạt Siêu cúp Pháp',
                'content' => 'Sáng 1-8, PSG đã có chiến thắng thuyết phục trước Nantes để đoạt Siêu cúp Pháp, danh hiệu đầu tiên của đội bóng thành Paris ở mùa giải mới.',
            ],
            [
                'id' => 26,
                'title' => 'Tây Bắc quyến rũ trong âm nhạc của Sèn Hoàng Mỹ Lam',
                'content' => 'Yêu quê hương, đắm đuối với bản sắc truyền thống của cộng đồng dân tộc mình và mong muốn lan tỏa những giá trị đẹp đó đến với công chúng, nhất là giới trẻ đang được Quán quân Sao Mai 2017-Sèn Hoàng Mỹ Lam theo đuổi thực hiện trên con đường nghệ thuật.',
            ],
            [
                'id' => 27,
                'title' => 'Hiện thực giấc mơ xuất khẩu phim hoạt hình Việt',
                'content' => 'Phim hoạt hình “Giấc mơ gỏi cuốn” của đạo diễn trẻ Mai Vũ (Việt Nam) vượt qua 1.512 ứng viên để đoạt giải ở hạng mục La Cinéf (Tìm kiếm tài năng mới) tại Liên hoan phim (LHP) Cannes 2022, đã khẳng định tiềm năng phát triển của phim hoạt hình Việt Nam.',
            ],
            [
                'id' => 28,
                'title' => 'Sắc màu chuồn chuồn tre Thạch Xá',
                'content' => 'Nếu tuổi thơ con trẻ của chúng ta được các nhà văn, nhà thơ khơi dậy bằng phép màu của ngôn từ thì nghệ nhân làm chuồn chuồn tre tại làng Thạch Xá (Thạch Thất, TP Hà Nội) lại chính là những người tô điểm thêm sắc màu cho những ký ức tuổi thơ ấy.',
            ],
            [
                'id' => 29,
                'title' => '"Bút nghiên dư ảnh", lớp học nuôi dưỡng tình yêu dân tộc',
                'content' => 'Nằm trong dự án “Không gian văn hóa Quốc Tử Giám”, lớp học “Bút nghiên dư ảnh” với nội dung chương trình tái hiện lại không khí học tập, thi cử thời kỳ phong kiến.',
            ],
            [
                'id' => 30,
                'title' => 'Ôn lại vốn văn hóa nước nhà qua “Việt Nam văn hóa sử cương”',
                'content' => '“Việt Nam văn hóa sử cương” là một trong những công trình quan trọng bậc nhất của học giả Đào Duy Anh, được biên soạn và xuất bản lần đầu năm 1938 và tái bản nhiều lần.',
            ],
            [
                'id' => 31,
                'title' => 'Hấp dẫn các hoạt động tại Làng Văn hóa - Du lịch các dân tộc Việt Nam',
                'content' => 'Từ ngày 1 đến 31-8, tại Làng Văn hóa-Du lịch các dân tộc Việt Nam (Hà Nội) diễn ra các hoạt động tháng 8 với chủ đề “Em yêu làng em”, gồm nhiều hoạt động hấp dẫn, như: Chương trình dân ca, dân vũ “Buôn làng vào hội” của đồng bào dân tộc Cơ Tu, Tà Ôi; giới thiệu điệu múa "Vũ điệu dâng trời", Lễ hội Mừng lúa mới của đồng bào dân tộc Cơ Tu...',
            ],
            [
                'id' => 32,
                'title' => 'Độc lạ nghề đẩy ghe xuồng',
                'content' => 'Ghe xuồng chạy dưới nước là chuyện chẳng có gì lạ. Tuy nhiên, ở Cà Mau ghe xuồng đang chạy ngon trớn ở kinh rạch có thể “bay qua” con đê đất rộng 2-3 mét để sang con kinh khác. Và “hóa phép” cho ghe xuồng “bay” qua đê cũng là một cái nghề của người dân vùng U Minh.',
            ],
            [
                'id' => 33,
                'title' => 'Tây Bắc giản dị qua "Tình biên viễn"',
                'content' => '39 tác phẩm hội họa bằng chất liệu sơn dầu và acrylic trong Triển lãm “Tình biên viễn” tại Bảo tàng Mỹ thuật Việt Nam mới đây của họa sĩ Đỗ Quyên Hoa đã khắc họa chân thực cuộc sống giản dị, giàu sức sống của người dân vùng đất Tây Bắc.',
            ],
            [
                'id' => 34,
                'title' => 'Ý chí trung kiên, sắt son của "hiệu trưởng"',
                'content' => 'Nhà tù Hỏa Lò (Hà Nội) được coi là địa ngục trần gian. Trong những ngày chiến tranh ác liệt, ngay trong lòng nhà tù của thực dân Pháp này, có một “trường học” vẫn được duy trì.',
            ],
            [
                'id' => 35,
                'title' => 'Văn học, nghệ thuật làm gì trước những vấn đề quan trọng, cấp thiết của đất nước hiện nay?',
                'content' => 'Theo kế hoạch, trong tháng 8-2022, Hội đồng Lý luận, phê bình văn học, nghệ thuật (VHNT) Trung ương sẽ tổ chức hội nghị tập huấn với chủ đề “Những vấn đề cơ bản đặt ra đối với VHNT trước yêu cầu mới”.',
            ],
            [
                'id' => 36,
                'title' => 'Trải nghiệm văn hóa truyền thống cùng đồng bào của 13 dân tộc',
                'content' => 'Từ ngày 1 đến 31-8, tại Làng Văn hóa - Du lịch các dân tộc Việt Nam sẽ diễn ra hoạt động với chủ đề “Em yêu làng em” với nhiều trải nghiệm thiết thực, bổ ích, ý nghĩa, tạo sân chơi cuối mùa hè cho các em học sinh. Chương trình do Ban quản lý Làng Văn hóa - Du lịch các dân tộc Việt Nam (Bộ Văn hóa, Thể thao và Du lịch) tổ chức.',
            ],
            [
                'id' => 37,
                'title' => 'Mưa mùa hạ',
                'content' => 'Những ngọn đồi nối tiếp nhau như gối đầu ngủ. Mây sà xuống khi chụm lại lúc nhãng ra bồng bềnh trong nắng. Cây rừng rợp bóng làm dịu mát tiết trời mùa hạ nơi miền sơn cước.',
            ],
            [
                'id' => 38,
                'title' => '86 đơn vị tham gia Liên hoan Phát thanh toàn quốc lần thứ XV năm 2022',
                'content' => 'Chiều 29-7, Đài Tiếng nói Việt Nam (VOV) phối hợp với Ủy ban nhân dân TP Hồ Chí Minh tổ chức họp báo giới thiệu Liên hoan Phát thanh toàn quốc lần thứ XV- năm 2022.',
            ],
            [
                'id' => 39,
                'title' => 'Phát động các cuộc thi ảnh nghệ thuật, thi viết về biển, đảo',
                'content' => 'Sáng 28-7, Hội Nhiếp ảnh TP Hồ Chí Minh, Quỹ học bổng Vừ A Dính, Câu lạc bộ “Vì Hoàng Sa - Trường Sa thân yêu” chính thức phát động Cuộc thi ảnh nghệ thuật chủ đề “Hoàng Sa - Trường Sa - Nhà giàn DK trong trái tim tôi”',
            ],
            [
                'id' => 40,
                'title' => 'Cháy mãi ngọn lửa tuổi 20',
                'content' => 'Kỷ niệm 75 năm Ngày Thương binh-Liệt sĩ (27-7), Câu lạc bộ (CLB) “Ngọn lửa tuổi 20” phối hợp với CLB “Mãi mãi tuổi 20” và CLB “Tiếng nói thanh niên” cùng viết nên “Hành trình tri ân 2022: Đi dọc Việt Nam-Nối dài đất nước”.',
            ],
        ];

        DB::table('blogs')->insert($blogs);
    }
}
