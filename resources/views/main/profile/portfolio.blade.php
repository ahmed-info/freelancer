@extends('main.layout.layout')
@section('main_content')

<!-- قسم الهيدر -->
<section class="bg-white border-b border-gray-200 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="#" class="text-gray-600 hover:text-primary">
                    <i class="fas fa-home"></i>
                </a>
                <span class="text-gray-300">|</span>
                <a href="#" class="text-gray-600 hover:text-primary">المستقلون</a>
                <span class="text-gray-300">|</span>
                <a href="#" class="text-gray-600 hover:text-primary">Andrew Alfy</a>
                <span class="text-gray-300">|</span>
                <span class="text-primary">معرض الأعمال</span>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="#" class="text-gray-600 hover:text-primary">
                    <i class="fas fa-bell"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-primary">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- قسم البروفايل الرئيسي -->
<section class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- العمود الأيسر -->
            <div class="md:w-1/3">
                <!-- صورة البروفايل -->
                <div class="bg-white rounded-lg shadow-sm p-6 text-center mb-6">
                    <div class="relative inline-block">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                             alt="Andrew Alfy"
                             class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white shadow-lg">
                        <div class="absolute bottom-2 right-2 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Andrew Alfy</h1>
                    <p class="text-gray-600 mb-4">مطور واجهات أمامية | Frontend Developer</p>

                    <!-- التقييم -->
                    <div class="flex items-center justify-center mb-4">
                        <div class="flex text-yellow-400 ml-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-700 font-bold">4.7</span>
                        <span class="text-gray-500 mx-2">|</span>
                        <span class="text-gray-600">(124 تقييم)</span>
                    </div>

                    <!-- معلومات الاتصال -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-map-marker-alt ml-2"></i>
                            <span>مصر</span>
                        </div>
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-clock ml-2"></i>
                            <span>مستقل منذ 2020</span>
                        </div>
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 ml-2"></i>
                            <span>الهوية موثقة</span>
                        </div>
                    </div>

                    <!-- الأزرار -->
                    <div class="space-y-3">
                        <button class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                            <i class="fas fa-comment ml-2"></i>
                            مراسلة
                        </button>
                        <button class="w-full border border-primary text-primary hover:bg-blue-50 font-bold py-3 px-4 rounded-lg transition duration-300">
                            <i class="fas fa-briefcase ml-2"></i>
                            طلب خدمة
                        </button>
                    </div>
                </div>

                <!-- الإحصائيات -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h3 class="font-bold text-gray-800 mb-4">الإحصائيات</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">معدل الاستجابة</span>
                            <span class="font-bold text-gray-800">98%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">سرعة الاستجابة</span>
                            <span class="font-bold text-gray-800">ساعتين</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">إنجاز المشاريع في الوقت</span>
                            <span class="font-bold text-gray-800">100%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">إعادة التوظيف</span>
                            <span class="font-bold text-gray-800">87%</span>
                        </div>
                    </div>
                </div>

                <!-- المهارات -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="font-bold text-gray-800 mb-4">المهارات</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['HTML', 'CSS', 'JavaScript', 'React', 'Vue.js', 'Bootstrap', 'Tailwind CSS', 'jQuery'] as $skill)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- العمود الأيمن -->
            <div class="md:w-2/3">
                <!-- التنقل -->
                @include('main.profile.partial')


                <!-- عنوان ومعرض الأعمال -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">معرض الأعمال</h2>
                            <p class="text-gray-600">استعرض مجموعة من أبرز المشاريع التي قمت بتنفيذها</p>
                        </div>

                        <!-- عوامل التصفية -->
                        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                            <select class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option>جميع الفئات</option>
                                <option>مواقع إلكترونية</option>
                                <option>تطبيقات ويب</option>
                                <option>تطبيقات جوال</option>
                                <option>تصاميم واجهات</option>
                            </select>
                            <select class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option>الأحدث أولاً</option>
                                <option>الأقدم أولاً</option>
                                <option>الأكثر مشاهدة</option>
                            </select>
                        </div>
                    </div>

                    <!-- شبكة الأعمال -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- عمل 1 -->
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 group">
                            <div class="relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1556656793-08538906a9f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                     alt="موقع تجارة إلكترونية"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center">
                                    <div class="opacity-0 group-hover:opacity-100 transition duration-300 flex space-x-2 space-x-reverse">
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-link"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800 mb-2">موقع تجارة إلكترونية متكامل</h3>
                                <p class="text-gray-600 text-sm mb-3">تطوير موقع تجارة إلكترونية باستخدام React.js مع نظام دفع إلكتروني متكامل</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">React</span>
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Node.js</span>
                                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">MongoDB</span>
                                </div>
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span>تم النشر: يناير 2024</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-eye ml-1"></i>
                                        <span>1.2K</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- عمل 2 -->
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 group">
                            <div class="relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80"
                                     alt="تطبيق إدارة المهام"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center">
                                    <div class="opacity-0 group-hover:opacity-100 transition duration-300 flex space-x-2 space-x-reverse">
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-link"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800 mb-2">تطبيق إدارة المهام</h3>
                                <p class="text-gray-600 text-sm mb-3">تطبيق ويب لإدارة المهام والمشاريع مع ميزات التعاون بين الفرق</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Vue.js</span>
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Firebase</span>
                                    <span class="bg-pink-100 text-pink-800 text-xs px-2 py-1 rounded">Tailwind</span>
                                </div>
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span>تم النشر: ديسمبر 2023</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-eye ml-1"></i>
                                        <span>987</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- عمل 3 -->
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 group">
                            <div class="relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1115&q=80"
                                     alt="منصة تعليمية"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center">
                                    <div class="opacity-0 group-hover:opacity-100 transition duration-300 flex space-x-2 space-x-reverse">
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-link"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800 mb-2">منصة تعليمية تفاعلية</h3>
                                <p class="text-gray-600 text-sm mb-3">منصة للتعلم الإلكتروني مع نظام فيديو تفاعلي واختبارات</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">React</span>
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Express</span>
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">MySQL</span>
                                </div>
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span>تم النشر: نوفمبر 2023</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-eye ml-1"></i>
                                        <span>1.5K</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- عمل 4 -->
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 group">
                            <div class="relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                     alt="لوحة تحكم إدارية"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center">
                                    <div class="opacity-0 group-hover:opacity-100 transition duration-300 flex space-x-2 space-x-reverse">
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-link"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800 mb-2">لوحة تحكم إدارية</h3>
                                <p class="text-gray-600 text-sm mb-3">لوحة تحكم شاملة للإدارة مع رسوم بيانية وتقارير متقدمة</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Angular</span>
                                    <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">TypeScript</span>
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Chart.js</span>
                                </div>
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span>تم النشر: أكتوبر 2023</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-eye ml-1"></i>
                                        <span>856</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- عمل 5 -->
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 group">
                            <div class="relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                     alt="تطبيق مطعم"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center">
                                    <div class="opacity-0 group-hover:opacity-100 transition duration-300 flex space-x-2 space-x-reverse">
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-link"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800 mb-2">تطبيق طلبات مطعم</h3>
                                <p class="text-gray-600 text-sm mb-3">تطبيق ويب لإدارة طلبات المطعم مع نظام حجز طاولات</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">React</span>
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Firebase</span>
                                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">Stripe</span>
                                </div>
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span>تم النشر: سبتمبر 2023</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-eye ml-1"></i>
                                        <span>1.1K</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- عمل 6 -->
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 group">
                            <div class="relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                     alt="موقع شركة سياحية"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center">
                                    <div class="opacity-0 group-hover:opacity-100 transition duration-300 flex space-x-2 space-x-reverse">
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-link"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800 mb-2">موقع شركة سياحية</h3>
                                <p class="text-gray-600 text-sm mb-3">موقع لعرض الرحلات والسياحه مع نظام حجوزات متكامل</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">HTML/CSS</span>
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">JavaScript</span>
                                    <span class="bg-pink-100 text-pink-800 text-xs px-2 py-1 rounded">Bootstrap</span>
                                </div>
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span>تم النشر: أغسطس 2023</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-eye ml-1"></i>
                                        <span>723</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- الترقيم -->
                    <div class="flex justify-center items-center space-x-2 space-x-reverse mt-12">
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-white font-bold transition duration-200">1</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">2</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">3</button>
                        <span class="text-gray-500 px-2">...</span>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">8</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    </div>
                </div>

                <!-- إحصائيات المشاريع -->
                <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white text-center mb-6">
                    <h3 class="text-2xl font-bold mb-6">إنجازاتي في الأرقام</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div>
                            <div class="text-3xl md:text-4xl font-bold mb-2">+50</div>
                            <p class="text-blue-100">مشروع مكتمل</p>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-bold mb-2">+35</div>
                            <p class="text-blue-100">عميل راضٍ</p>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-bold mb-2">98%</div>
                            <p class="text-blue-100">معدل الرضا</p>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-bold mb-2">3+</div>
                            <p class="text-blue-100">سنوات خبرة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.gradient-bg {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.card-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.floating-shape {
    position: absolute;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.floating-shape:nth-child(1) {
    width: 200px;
    height: 200px;
    top: -100px;
    right: -100px;
    animation-delay: 0s;
}

.floating-shape:nth-child(2) {
    width: 150px;
    height: 150px;
    bottom: -75px;
    left: 20%;
    animation-delay: 2s;
}

.floating-shape:nth-child(3) {
    width: 100px;
    height: 100px;
    top: 20%;
    right: 20%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(10deg); }
}

.animate-fade-in {
    animation: fadeIn 1s ease-in;
}

.animate-fade-in-up {
    animation: fadeInUp 1s ease-out;
}

.animate-slide-up {
    animation: slideUp 1s ease-out;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animate-bounce-slow {
    animation: bounce 2s infinite;
}

.animate-pulse-glow {
    animation: pulseGlow 2s infinite;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

@keyframes pulseGlow {
    0% {
        box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(102, 126, 234, 0);
    }
}

.service-icon {
    transition: transform 0.3s ease;
}

.service-card:hover .service-icon {
    transform: scale(1.1) rotate(5deg);
}

.animate-wiggle {
    animation: wiggle 2s ease-in-out infinite;
}

@keyframes wiggle {
    0%, 7% {
        transform: rotateZ(0);
    }
    15% {
        transform: rotateZ(-15deg);
    }
    20% {
        transform: rotateZ(10deg);
    }
    25% {
        transform: rotateZ(-10deg);
    }
    30% {
        transform: rotateZ(6deg);
    }
    35% {
        transform: rotateZ(-4deg);
    }
    40%, 100% {
        transform: rotateZ(0);
    }
}

.animate-slide-in-left {
    animation: slideInLeft 0.8s ease-out;
}

.animate-slide-in-right {
    animation: slideInRight 0.8s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* تنسيقات إضافية لمعرض الأعمال */
.portfolio-item {
    transition: all 0.3s ease;
}

.portfolio-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.portfolio-image {
    transition: transform 0.3s ease;
}

.portfolio-item:hover .portfolio-image {
    transform: scale(1.05);
}

.portfolio-overlay {
    transition: all 0.3s ease;
}

.portfolio-item:hover .portfolio-overlay {
    background: rgba(0,0,0,0.3);
}

.portfolio-actions {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.portfolio-item:hover .portfolio-actions {
    opacity: 1;
}

.tech-tag {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
}
</style>

@endsection
