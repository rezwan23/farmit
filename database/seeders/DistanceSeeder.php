<?php
namespace Database\Seeders;

use App\Models\Distance;
use Illuminate\Database\Seeder;

class DistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $distances = [
            'DHAKA' => [ 0, 178, 316, 247, 169, 205, 197, 109, 115, 242, 215, 96, 391, 338, 101, 149, 268, 37, 127, 163, 179, 164, 182, 178, 249, 259, 180, 117, 348, 183, 137, 343, 90, 150, 63, 240, 203, 27, 122, 247, 130, 17, 51, 210, 302, 158, 359, 158, 216, 443, 204, 185, 118, 256, 293, 304, 240, 101, 188, 134, 296, 241, 92, 407],
            'BAGERHAT' => [ 178, 0, 437, 160, 119, 155, 328, 283, 182, 363, 175, 269, 512, 467, 140, 270, 397, 215, 52, 336, 357, 93, 100, 139, 378, 381, 34, 290, 477, 184, 209, 472, 110, 136, 200, 201, 376, 179, 300, 357, 107, 186, 225, 260, 352, 336, 488, 244, 234, 572, 151, 66, 167, 306, 415, 433, 94, 134, 366, 311, 470, 414, 270, 536],
            'BANDARBAN' => [316, 437, 0, 469, 391, 427, 510, 301, 271, 85, 526, 225, 121, 651, 413, 167, 581, 350, 386, 376, 492, 476, 404, 490, 563, 133, 439, 379, 661, 499, 229, 656, 327, 461, 379, 552, 416, 329, 436, 561, 442, 314, 339, 524, 616, 444, 672, 208, 530, 757, 426, 438, 434, 569, 74, 618, 499, 317, 501, 447, 509, 454, 406, 720],
            'BARGUNA' => [247, 160, 469, 0, 84, 120, 445, 352, 214, 396, 323, 281, 544, 584, 209, 303, 513, 284, 196, 406, 426, 209, 95, 286, 495, 413, 150, 360, 594, 301, 241, 589, 143, 258, 270, 348, 446, 248, 370, 473, 227, 255, 294, 377, 469, 406, 604, 276, 350, 689, 44, 96, 236, 423, 447, 550, 206, 166, 435, 381, 539, 483, 340, 652],
            'BARISHAL' => [169, 119, 391, 84, 0, 36, 366, 273, 135, 317, 244, 202, 465, 505, 131, 224, 435, 206, 117, 327, 348, 168, 19, 207, 416, 334, 109, 281, 515, 222, 162, 510, 64, 179, 191, 270, 367, 169, 291, 395, 148, 177, 215, 298, 390, 327, 526, 197, 272, 610, 41, 53, 158, 344, 368, 471, 164, 87, 357, 302, 460, 405, 261, 574],
            'BHOLA' => [205, 155, 427, 120, 36, 0, 402, 309, 171, 353, 280, 238, 501, 541, 167, 260, 471, 242, 153, 363, 384, 204, 55, 243, 452, 370, 145, 317, 551, 258, 198, 546, 100, 215, 227, 306, 403, 205, 327, 431, 184, 213, 251, 334, 426, 363, 562, 233, 308, 646, 77, 89, 194, 380, 404, 507, 200, 123, 393, 338, 496, 441, 297, 610],
            'BOGURA' => [ 197, 328, 510, 445, 366, 402, 0, 274, 309, 437, 192, 291, 585, 141, 239, 344, 71, 169, 324, 328, 172, 235, 379, 190, 52, 454, 295, 201, 151, 144, 331, 146, 287, 217, 188, 182, 368, 221, 178, 50, 269, 211, 217, 68, 160, 217, 162, 353, 127, 246, 401, 350, 208, 114, 488, 107, 307, 298, 188, 72, 462, 406, 105, 210],
            'BRAHMANBARIA' => [ 109, 283, 301, 352, 273, 309, 274, 0, 143, 227, 320, 81, 375, 416, 206, 134, 345, 114, 231, 76, 203, 269, 287, 283, 327, 244, 285, 79, 425, 268, 164, 420, 195, 254, 148, 326, 116, 123, 147, 325, 235, 107, 67, 288, 380, 144, 436, 143, 294, 521, 308, 290, 204, 334, 278, 382, 344, 205, 204, 211, 209, 153, 170, 484],
            'CHANDPUR' => [ 115, 182, 271, 214, 135, 171, 309, 143, 0, 198, 257, 67, 346, 450, 144, 105, 380, 149, 130, 218, 291, 195, 149, 220, 361, 215, 184, 221, 460, 235, 43, 455, 71, 192, 177, 283, 258, 128, 234, 359, 162, 113, 137, 311, 403, 270, 471, 78, 285, 555, 170, 182, 171, 357, 249, 416, 243, 62, 300, 246, 351, 295, 204, 519],
            'CHATTOGRAM' => [ 242, 363, 85, 396, 317, 353, 437, 227, 198, 0, 453, 151, 160, 578, 339, 93, 507, 276, 312, 302, 418, 402, 330, 416, 489, 117, 366, 305, 588, 425, 155, 583, 253, 387, 305, 478, 342, 256, 362, 487, 368, 240, 265, 450, 542, 370, 598, 134, 456, 683, 352, 364, 360, 496, 78, 544, 425, 244, 427, 373, 436, 380, 332, 646],
            'CHUADANGA' => [ 215, 175, 526, 323, 244, 280, 192, 320, 257, 453, 0, 306, 601, 331, 118, 360, 261, 237, 171, 373, 276, 82, 231, 37, 243, 470, 142, 305, 341, 49, 284, 336, 186, 65, 173, 26, 413, 216, 282, 221, 116, 223, 262, 124, 217, 321, 352, 319, 98, 437, 279, 198, 108, 170, 504, 297, 154, 209, 291, 176, 507, 451, 209, 400],
            'CUMILLA' => [96, 269, 225, 281, 202, 238, 291, 81, 67, 151, 306, 0, 300, 432, 193, 58, 361, 130, 218, 156, 272, 256, 215, 270, 343, 169, 272, 159, 441, 279, 89, 436, 138, 241, 159, 332, 196, 109, 216, 341, 222, 94, 119, 304, 396, 224, 452, 67, 310, 537, 237, 249, 214, 350, 203, 398, 331, 128, 281, 227, 290, 234, 186, 500],
            'COX\'S BAZAR' => [ 391, 512, 121, 544, 465, 501, 585, 375, 346, 160, 601, 300, 0, 726, 487, 241, 655, 425, 460, 450, 567, 550, 479, 564, 637, 252, 514, 453, 736, 573, 303, 731, 401, 536, 453, 626, 490, 404, 510, 635, 516, 389, 413, 598, 690, 518, 747, 282, 604, 831, 500, 512, 509, 644, 195, 692, 574, 392, 576, 522, 584, 528, 480, 795],
            'DINAJPUR' => [ 338, 467, 651, 584, 505, 541, 141, 416, 450, 578, 331, 432, 726, 0, 378, 485, 120, 310, 463, 469, 313, 374, 519, 329, 89, 595, 434, 342, 134, 283, 472, 129, 428, 355, 329, 321, 509, 362, 320, 127, 408, 352, 358, 207, 216, 359, 57, 494, 266, 94, 540, 489, 347, 205, 629, 78, 446, 439, 329, 213, 603, 547, 246, 58],
            'FARIDPUR' => [ 101, 140, 413, 209, 131, 167, 239, 206, 144, 339, 118, 193, 487, 378, 0, 246, 308, 128, 89, 260, 235, 96, 144, 81, 290, 356, 155, 214, 388, 96, 171, 383, 73, 52, 65, 143, 300, 102, 203, 268, 100, 109, 148, 171, 264, 239, 399, 206, 145, 484, 166, 147, 31, 217, 390, 345, 168, 96, 250, 190, 393, 337, 148, 447],
            'FENI' => [149, 270, 167, 303, 224, 260, 344, 134, 105, 93, 360, 58, 241, 485, 246, 0, 414, 183, 219, 209, 325, 309, 237, 323, 396, 110, 273, 212, 495, 332, 62, 490, 160, 294, 212, 385, 249, 163, 269, 394, 275, 147, 172, 357, 449, 277, 505, 41, 363, 590, 259, 271, 267, 403, 144, 451, 332, 151, 334, 280, 343, 287, 239, 553],
            'GAIBANDHA' => [ 268, 397, 581, 513, 435, 471, 71, 345, 380, 507, 261, 361, 655, 120, 308, 414, 0, 239, 392, 399, 243, 304, 448, 259, 77, 524, 363, 271, 120, 212, 402, 115, 358, 285, 259, 250, 439, 292, 249, 117, 338, 282, 287, 137, 229, 288, 131, 423, 195, 216, 470, 419, 277, 182, 558, 76, 376, 368, 258, 142, 532, 476, 176, 179],
            'GAZIPUR' => [ 37, 215, 350, 284, 206, 242, 169, 114, 149, 276, 237, 130, 425, 310, 128, 183, 239, 0, 164, 168, 151, 216, 219, 200, 221, 294, 217, 99, 320, 184, 171, 315, 127, 172, 64, 241, 208, 61, 93, 219, 167, 51, 56, 182, 274, 129, 330, 193, 188, 415, 241, 222, 119, 228, 328, 276, 287, 138, 159, 105, 301, 246, 64, 378],
            'GOPALGANJ' => [ 127, 52, 386, 196, 117, 153, 324, 231, 130, 312, 171, 218, 460, 463, 89, 219, 392, 164, 0, 285, 305, 89, 91, 135, 374, 329, 54, 239, 473, 180, 157, 468, 59, 105, 149, 197, 325, 127, 249, 353, 55, 134, 173, 256, 348, 285, 483, 192, 230, 568, 152, 59, 116, 302, 363, 429, 114, 82, 314, 260, 418, 363, 219, 532],
            'HABIGANJ' => [ 163, 336, 376, 406, 327, 363, 328, 76, 218, 302, 373, 156, 450, 469, 260, 209, 399, 168, 285, 0, 257, 322, 340, 336, 380, 319, 338, 132, 479, 322, 239, 474, 248, 308, 202, 380, 63, 176, 200, 378, 289, 161, 121, 341, 433, 197, 490, 218, 347, 574, 362, 343, 257, 387, 353, 435, 398, 259, 258, 265, 137, 81, 223, 538],
            'JAMALPUR' => [ 179, 357, 492, 426, 348, 384, 172, 203, 291, 418, 276, 272, 567, 313, 235, 325, 243, 151, 305, 257, 0, 319, 361, 274, 224, 436, 378, 125, 323, 227, 313, 318, 269, 278, 170, 266, 297, 203, 57, 222, 309, 193, 198, 185, 278, 96, 334, 335, 191, 418, 383, 364, 226, 231, 470, 279, 391, 280, 16, 109, 391, 335, 87, 382],
            'JASHORE' => [ 164, 93, 476, 209, 168, 204, 235, 269, 195, 402, 82, 256, 550, 374, 96, 309, 304, 216, 89, 322, 319, 0, 148, 46, 286, 419, 59, 277, 384, 92, 222, 379, 124, 44, 152, 108, 362, 165, 291, 264, 34, 172, 211, 167, 259, 327, 395, 257, 141, 480, 200, 115, 119, 213, 453, 340, 72, 147, 334, 219, 456, 400, 236, 443],
            'JHALAKATI' => [182, 100, 404, 95, 19, 55, 379, 287, 149, 330, 231, 215, 479, 519, 144, 237, 448, 219, 91, 340, 361, 148, 0, 194, 430, 348, 90, 294, 528, 236, 176, 523, 77, 193, 205, 256, 380, 183, 305, 408, 162, 190, 229, 311, 404, 340, 539, 210, 285, 624, 52, 33, 171, 357, 382, 485, 145, 101, 370, 316, 474, 418, 275, 587],
            'JHENAIDAH' => [178, 139, 490, 286, 207, 243, 190, 283, 220, 416, 37, 270, 564, 329, 81, 323, 259, 200, 135, 336, 274, 46, 194, 0, 240, 433, 105, 281, 339, 46, 248, 334, 149, 28, 137, 62, 376, 179, 280, 219, 79, 186, 225, 122, 214, 319, 350, 282, 96, 434, 242, 161, 103, 168, 467, 295, 118, 173, 289, 173, 470, 414, 207, 398],
            'JOYPURHAT' => [ 249, 378, 563, 495, 416, 452, 52, 327, 361, 489, 243, 343, 637, 89, 290, 396, 77, 221, 374, 380, 224, 286, 430, 240, 0, 506, 345, 253, 157, 194, 384, 152, 340, 267, 241, 232, 420, 274, 231, 39, 319, 264, 269, 118, 128, 270, 103, 405, 177, 181, 451, 401, 259, 116, 540, 113, 358, 350, 240, 124, 514, 458, 158, 144],
            'KHAGRACHHARI' => [ 259, 381, 133, 413, 334, 370, 454, 244, 215, 117, 470, 169, 252, 595, 356, 110, 524, 294, 329, 319, 436, 419, 348, 433, 506, 0, 383, 322, 605, 442, 172, 600, 270, 405, 322, 495, 359, 273, 379, 504, 385, 258, 282, 467, 559, 387, 615, 151, 473, 700, 369, 381, 378, 513, 70, 561, 442, 261, 445, 390, 453, 397, 349, 664],
            'KHULNA' => [180, 34, 439, 150, 109, 145, 295, 285, 184, 366, 142, 272, 514, 434, 155, 273, 363, 217, 54, 338, 378, 59, 90, 105, 345, 383, 0, 292, 444, 151, 211, 439, 113, 103, 211, 167, 378, 181, 302, 323, 90, 188, 227, 227, 319, 338, 454, 246, 200, 539, 141, 56, 177, 272, 417, 400, 59, 136, 394, 278, 472, 416, 273, 502],
            'KISHOREGANJ' => [ 117, 290, 379, 360, 281, 317, 201, 79, 221, 305, 305, 159, 453, 342, 214, 212, 271, 99, 239, 132, 125, 277, 294, 281, 253, 322, 292, 0, 352, 256, 242, 347, 203, 253, 145, 294, 172, 130, 68, 251, 243, 115, 75, 214, 306, 65, 363, 221, 220, 447, 316, 297, 200, 260, 356, 308, 352, 213, 125, 138, 266, 210, 116, 411],
            'KURIGRAM' => [348, 477, 661, 594, 515, 551, 151, 425, 460, 588, 341, 441, 736, 134, 388, 495, 120, 320, 473, 479, 323, 384, 528, 339, 157, 605, 444, 352, 0, 293, 482, 29, 438, 365, 339, 331, 519, 372, 329, 197, 418, 362, 368, 217, 309, 368, 111, 504, 276, 196, 550, 499, 357, 263, 639, 56, 456, 449, 339, 223, 613, 557, 256, 159],
            'KUSHTIA' => [ 183, 184, 499, 301, 222, 258, 144, 268, 235, 425, 49, 279, 573, 283, 96, 332, 212, 184, 180, 322, 227, 92, 236, 46, 194, 442, 151, 256, 293, 0, 262, 288, 164, 73, 120, 58, 362, 194, 234, 172, 125, 199, 210, 76, 168, 273, 303, 297, 49, 388, 257, 207, 65, 122, 476, 249, 164, 188, 243, 127, 455, 400, 161, 351],
            'LAKSHMIPUR' => [137, 209, 229, 241, 162, 198, 331, 164, 43, 155, 284, 89, 303, 472, 171, 62, 402, 171, 157, 239, 313, 222, 176, 248, 384, 172, 211, 242, 482, 262, 0, 477, 98, 219, 200, 310, 279, 150, 257, 381, 189, 135, 160, 338, 430, 292, 493, 35, 312, 578, 197, 209, 198, 384, 206, 438, 270, 89, 322, 268, 373, 317, 227, 541],
            'LALMONIRHAT' => [343, 472, 656, 589, 510, 546, 146, 420, 455, 583, 336, 436, 731, 129, 383, 490, 115, 315, 468, 474, 318, 379, 523, 334, 152, 600, 439, 347, 29, 288, 477, 0, 433, 360, 334, 326, 514, 367, 324, 192, 413, 357, 363, 212, 304, 363, 106, 499, 271, 191, 545, 494, 352, 258, 634, 51, 451, 444, 334, 218, 608, 552, 251, 154],
            'MADARIPUR' => [90, 110, 327, 143, 64, 100, 287, 195, 71, 253, 186, 138, 401, 428, 73, 160, 358, 127, 59, 248, 269, 124, 77, 149, 340, 270, 113, 203, 438, 164, 98, 433, 0, 121, 133, 212, 289, 91, 213, 337, 90, 98, 137, 240, 332, 249, 449, 133, 214, 534, 99, 111, 100, 286, 304, 395, 172, 23, 278, 224, 382, 326, 183, 497],
            'MAGURA' => [ 150, 136, 461, 258, 179, 215, 217, 254, 192, 387, 65, 241, 536, 355, 52, 294, 285, 172, 105, 308, 278, 44, 193, 28, 267, 405, 103, 253, 365, 73, 219, 360, 121, 0, 108, 91, 348, 151, 247, 245, 50, 158, 197, 148, 241, 283, 376, 254, 122, 461, 214, 158, 75, 194, 439, 322, 115, 144, 294, 200, 442, 386, 192, 424],
            'MANIKGANJ' => [ 63, 200, 379, 270, 191, 227, 188, 148, 177, 305, 173, 159, 453, 329, 65, 212, 259, 64, 149, 202, 170, 152, 205, 137, 241, 322, 211, 145, 339, 120, 200, 334, 133, 108, 0, 178, 242, 89, 138, 239, 156, 80, 90, 202, 294, 174, 350, 221, 169, 435, 226, 208, 55, 248, 356, 296, 224, 156, 186, 125, 335, 280, 84, 398],
            'MEHERPUR' => [ 240, 201, 552, 348, 270, 306, 182, 326, 283, 478, 26, 332, 626, 321, 143, 385, 250, 241, 197, 380, 266, 108, 256, 62, 232, 495, 167, 294, 331, 58, 310, 326, 212, 91, 178, 0, 420, 241, 272, 211, 142, 248, 268, 114, 206, 311, 342, 345, 88, 426, 305, 223, 122, 160, 529, 287, 180, 235, 281, 165, 513, 457, 199, 390],
            'MOULVIBAZAR' => [203, 376, 416, 446, 367, 403, 368, 116, 258, 342, 413, 196, 490, 509, 300, 249, 439, 208, 325, 63, 297, 362, 380, 376, 420, 359, 378, 172, 519, 362, 279, 514, 289, 348, 242, 420, 0, 216, 240, 418, 329, 201, 161, 381, 474, 237, 530, 258, 387, 614, 402, 383, 297, 427, 393, 475, 438, 299, 298, 305, 117, 58, 264, 578],
            'MUNSHIGANJ' => [ 27, 179, 329, 248, 169, 205, 221, 123, 128, 256, 216, 109, 404, 362, 102, 163, 292, 61, 127, 176, 203, 165, 183, 179, 274, 273, 181, 130, 372, 194, 150, 367, 91, 151, 89, 241, 216, 0, 147, 271, 131, 15, 65, 234, 327, 182, 383, 172, 240, 468, 204, 186, 129, 280, 307, 328, 240, 101, 212, 158, 310, 254, 117, 431],
            'MYMENSINGH' => [ 122, 300, 436, 370, 291, 327, 178, 147, 234, 362, 282, 216, 510, 320, 203, 269, 249, 93, 249, 200, 57, 291, 305, 280, 231, 379, 302, 68, 329, 234, 257, 324, 213, 247, 138, 272, 240, 147, 0, 229, 253, 137, 135, 192, 284, 39, 340, 278, 198, 425, 326, 308, 194, 238, 413, 286, 362, 223, 69, 115, 334, 278, 94, 388],
            'NAOGAON' => [ 247, 357, 561, 473, 395, 431, 50, 325, 359, 487, 221, 341, 635, 127, 268, 394, 117, 219, 353, 378, 222, 264, 408, 219, 39, 504, 323, 251, 197, 172, 381, 192, 337, 245, 239, 211, 418, 271, 229, 0, 298, 261, 267, 97, 98, 268, 142, 403, 156, 219, 430, 379, 237, 78, 538, 153, 336, 348, 238, 122, 512, 456, 156, 182],
            'NARAIL' => [130, 107, 442, 227, 148, 184, 269, 235, 162, 368, 116, 222, 516, 408, 100, 275, 338, 167, 55, 289, 309, 34, 162, 79, 319, 385, 90, 243, 418, 125, 189, 413, 90, 50, 156, 142, 329, 131, 253, 298, 0, 138, 177, 201, 293, 289, 429, 223, 175, 513, 183, 114, 122, 247, 419, 374, 103, 114, 318, 252, 422, 366, 223, 477],
            'NARAYANGANJ' => [ 17, 186, 314, 255, 177, 213, 211, 107, 113, 240, 223, 94, 389, 352, 109, 147, 282, 51, 134, 161, 193, 172, 190, 186, 264, 258, 188, 115, 362, 199, 135, 357, 98, 158, 80, 248, 201, 15, 137, 261, 138, 0, 49, 224, 317, 172, 373, 157, 230, 458, 212, 193, 135, 270, 292, 318, 247, 108, 202, 148, 294, 239, 107, 421],
            'NARSINGDI' => [51, 225, 339, 294, 215, 251, 217, 67, 137, 265, 262, 119, 413, 358, 148, 172, 287, 56, 173, 121, 198, 211, 229, 225, 269, 282, 227, 75, 368, 210, 160, 363, 137, 197, 90, 268, 161, 65, 135, 267, 177, 49, 0, 230, 322, 140, 378, 181, 236, 463, 250, 232, 146, 276, 316, 324, 286, 147, 200, 153, 254, 198, 112, 426],
            'NATORE' => [210, 260, 524, 377, 298, 334, 68, 288, 311, 450, 124, 304, 598, 207, 171, 357, 137, 182, 256, 341, 185, 167, 311, 122, 118, 467, 227, 214, 217, 76, 338, 212, 240, 148, 202, 114, 381, 234, 192, 97, 201, 224, 230, 0, 92, 231, 228, 366, 59, 312, 333, 282, 140, 46, 501, 173, 239, 263, 201, 85, 475, 419, 119, 276],
            'CHAPAINAWABGANJ' => [302, 352, 616, 469, 390, 426, 160, 380, 403, 542, 217, 396, 690, 216, 264, 449, 229, 274, 348, 433, 278, 259, 404, 214, 128, 559, 319, 306, 309, 168, 430, 304, 332, 241, 294, 206, 474, 327, 284, 98, 293, 317, 322, 92, 0, 323, 230, 458, 151, 308, 425, 375, 232, 46, 593, 265, 332, 356, 293, 177, 567, 511, 211, 271],
            'NETROKONA' => [158, 336, 444, 406, 327, 363, 217, 144, 270, 370, 321, 224, 518, 359, 239, 277, 288, 129, 285, 197, 96, 327, 340, 319, 270, 387, 338, 65, 368, 273, 292, 363, 249, 283, 174, 311, 237, 182, 39, 268, 289, 172, 140, 231, 323, 0, 379, 286, 237, 464, 362, 343, 230, 277, 421, 325, 398, 259, 96, 154, 331, 275, 133, 427],
            'NILPHAMARI' => [ 359, 488, 672, 604, 526, 562, 162, 436, 471, 598, 352, 452, 747, 57, 399, 505, 131, 330, 483, 490, 334, 395, 539, 350, 103, 615, 454, 363, 111, 303, 493, 106, 449, 376, 350, 342, 530, 383, 340, 142, 429, 373, 378, 228, 230, 379, 0, 514, 286, 68, 561, 510, 368, 274, 649, 55, 467, 459, 349, 233, 623, 567, 267, 62],
            'NOAKHALI' => [158, 244, 208, 276, 197, 233, 353, 143, 78, 134, 319, 67, 282, 494, 206, 41, 423, 193, 192, 218, 335, 257, 210, 282, 405, 151, 246, 221, 504, 297, 35, 499, 133, 254, 221, 345, 258, 172, 278, 403, 223, 157, 181, 366, 458, 286, 514, 0, 347, 599, 232, 244, 233, 412, 185, 460, 305, 124, 344, 289, 352, 296, 248, 562],
            'PABNA' => [ 216, 234, 530, 350, 272, 308, 127, 294, 285, 456, 98, 310, 604, 266, 145, 363, 195, 188, 230, 347, 191, 141, 285, 96, 177, 473, 200, 220, 276, 49, 312, 271, 214, 122, 169, 88, 387, 240, 198, 156, 175, 230, 236, 59, 151, 237, 286, 347, 0, 371, 307, 256, 114, 105, 507, 232, 213, 237, 207, 91, 481, 425, 125, 335],
            'PANCHAGARH' => [443, 572, 757, 689, 610, 646, 246, 521, 555, 683, 437, 537, 831, 94, 484, 590, 216, 415, 568, 574, 418, 480, 624, 434, 181, 700, 539, 447, 196, 388, 578, 191, 534, 461, 435, 426, 614, 468, 425, 219, 513, 458, 463, 312, 308, 464, 68, 599, 371, 0, 645, 595, 453, 296, 734, 140, 552, 544, 434, 318, 708, 652, 352, 37],
            'PATUAKHALI' => [ 204, 151, 426, 44, 41, 77, 401, 308, 170, 352, 279, 237, 500, 540, 166, 259, 470, 241, 152, 362, 383, 200, 52, 242, 451, 369, 141, 316, 550, 257, 197, 545, 99, 214, 226, 305, 402, 204, 326, 430, 183, 212, 250, 333, 425, 362, 561, 232, 307, 645, 0, 85, 193, 379, 403, 506, 197, 122, 392, 337, 495, 440, 296, 609],
            'PIROJPUR' => [185, 66, 438, 96, 53, 89, 350, 290, 182, 364, 198, 249, 512, 489, 147, 271, 419, 222, 59, 343, 364, 115, 33, 161, 401, 381, 56, 297, 499, 207, 209, 494, 111, 158, 208, 223, 383, 186, 308, 379, 114, 193, 232, 282, 375, 343, 510, 244, 256, 595, 85, 0, 174, 328, 415, 455, 112, 134, 373, 334, 477, 421, 278, 558],
            'RAJBARI' => [118, 167, 434, 236, 158, 194, 208, 204, 171, 360, 108, 214, 509, 347, 31, 267, 277, 119, 116, 257, 226, 119, 171, 103, 259, 378, 177, 200, 357, 65, 198, 352, 100, 75, 55, 122, 297, 129, 194, 237, 122, 135, 146, 140, 232, 230, 368, 233, 114, 453, 193, 174, 0, 186, 412, 313, 190, 123, 241, 180, 391, 335, 139, 416],
            'RAJSHAHI' => [256, 306, 569, 423, 344, 380, 114, 334, 357, 496, 170, 350, 644, 205, 217, 403, 182, 228, 302, 387, 231, 213, 357, 168, 116, 513, 272, 260, 263, 122, 384, 258, 286, 194, 248, 160, 427, 280, 238, 78, 247, 270, 276, 46, 46, 277, 274, 412, 105, 296, 379, 328, 186, 0, 547, 219, 285, 309, 247, 131, 521, 465, 164, 260],
            'RANGAMATI' => [ 293, 415, 74, 447, 368, 404, 488, 278, 249, 78, 504, 203, 195, 629, 390, 144, 558, 328, 363, 353, 470, 453, 382, 467, 540, 70, 417, 356, 639, 476, 206, 634, 304, 439, 356, 529, 393, 307, 413, 538, 419, 292, 316, 501, 593, 421, 649, 185, 507, 734, 403, 415, 412, 547, 0, 595, 476, 295, 479, 424, 487, 431, 383, 698],
            'RANGPUR' => [304, 433, 618, 550, 471, 507, 107, 382, 416, 544, 297, 398, 692, 78, 345, 451, 76, 276, 429, 435, 279, 340, 485, 295, 113, 561, 400, 308, 56, 249, 438, 51, 395, 322, 296, 287, 475, 328, 286, 153, 374, 318, 324, 173, 265, 325, 55, 460, 232, 140, 506, 455, 313, 219, 595, 0, 412, 405, 295, 179, 569, 513, 213, 103],
            'SATKHIRA' => [ 240, 94, 499, 206, 164, 200, 307, 344, 243, 425, 154, 331, 574, 446, 168, 332, 376, 287, 114, 398, 391, 72, 145, 118, 358, 442, 59, 352, 456, 164, 270, 451, 172, 115, 224, 180, 438, 240, 362, 336, 103, 247, 286, 239, 332, 398, 467, 305, 213, 552, 197, 112, 190, 285, 476, 412, 0, 195, 406, 291, 531, 476, 307, 515],
            'SHARIATPUR' => [101, 134, 317, 166, 87, 123, 298, 205, 62, 244, 209, 128, 392, 439, 96, 151, 368, 138, 82, 259, 280, 147, 101, 173, 350, 261, 136, 213, 449, 188, 89, 444, 23, 144, 156, 235, 299, 101, 223, 348, 114, 108, 147, 263, 356, 259, 459, 124, 237, 544, 122, 134, 123, 309, 295, 405, 195, 0, 289, 234, 392, 337, 193, 507],
            'SHERPUR' => [188, 366, 501, 435, 357, 393, 188, 204, 300, 427, 291, 281, 576, 329, 250, 334, 258, 159, 314, 258, 16, 334, 370, 289, 240, 445, 394, 125, 339, 243, 322, 334, 278, 294, 186, 281, 298, 212, 69, 238, 318, 202, 200, 201, 293, 96, 349, 344, 207, 434, 392, 373, 241, 247, 479, 295, 406, 289, 0, 124, 391, 335, 103, 397],
            'SIRAJGANJ' => [134, 311, 447, 381, 302, 338, 72, 211, 246, 373, 176, 227, 522, 213, 190, 280, 142, 105, 260, 265, 109, 219, 316, 173, 124, 390, 278, 138, 223, 127, 268, 218, 224, 200, 125, 165, 305, 158, 115, 122, 252, 148, 153, 85, 177, 154, 233, 289, 91, 318, 337, 334, 180, 131, 424, 179, 291, 234, 124, 0, 398, 342, 42, 281],
            'SUNAMGANJ' => [ 296, 470, 509, 539, 460, 496, 462, 209, 351, 436, 507, 290, 584, 603, 393, 343, 532, 301, 418, 137, 391, 456, 474, 470, 514, 453, 472, 266, 613, 455, 373, 608, 382, 442, 335, 513, 117, 310, 334, 512, 422, 294, 254, 475, 567, 331, 623, 352, 481, 708, 495, 477, 391, 521, 487, 569, 531, 392, 391, 398, 0, 68, 357, 671],
            'SYLHET' => [241, 414, 454, 483, 405, 441, 406, 153, 295, 380, 451, 234, 528, 547, 337, 287, 476, 246, 363, 81, 335, 400, 418, 414, 458, 397, 416, 210, 557, 400, 317, 552, 326, 386, 280, 457, 58, 254, 278, 456, 366, 239, 198, 419, 511, 275, 567, 296, 425, 652, 440, 421, 335, 465, 431, 513, 476, 337, 335, 342, 68, 0, 301, 616],
            'TANGAIL' => [ 92, 270, 406, 340, 261, 297, 105, 170, 204, 332, 209, 186, 480, 246, 148, 239, 176, 64, 219, 223, 87, 236, 275, 207, 158, 349, 273, 116, 256, 161, 227, 251, 183, 192, 84, 199, 264, 117, 94, 156, 223, 107, 112, 119, 211, 133, 267, 248, 125, 352, 296, 278, 139, 164, 383, 213, 307, 193, 103, 42, 357, 301, 0, 315],
            'THAKURGAON' => [407, 536, 720, 652, 574, 610, 210, 484, 519, 646, 400, 500, 795, 58, 447, 553, 179, 378, 532, 538, 382, 443, 587, 398, 144, 664, 502, 411, 159, 351, 541, 154, 497, 424, 398, 390, 578, 431, 388, 182, 477, 421, 426, 276, 271, 427, 62, 562, 335, 37, 609, 558, 416, 260, 698, 103, 515, 507, 397, 281, 671, 616, 315, 0]
        ];

        $districts = array_keys($distances);


        foreach($distances as $disKey => $distance){
            foreach($distance as $key => $value){
                Distance::create([
                    'from'  =>  $disKey,
                    'to'    =>  $districts[$key],
                    'distance'  =>  $value,
                ]);
            }
        }
    }
}
