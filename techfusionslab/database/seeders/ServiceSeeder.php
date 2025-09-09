<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title'       => 'Personal Financial Planning',
                'number'      => '01',
                'icon'        => 'frontend/assets/img/home-1/icon/21.svg',
                'link'        => 'service-details.html',
                'description' => 'Personal Financial Planning helps you manage income, savings, and investments with tailored strategies—so you can achieve your financial goals, reduce risk, and build long-term security with confidence and clarity.',
                'hover_image' => 'frontend/assets/img/home-1/service/hover.png',
            ],
            [
                'title'       => 'Investment Advisory Services',
                'number'      => '02',
                'icon'        => 'frontend/assets/img/home-1/icon/22.svg',
                'link'        => 'service-details.html',
                'description' => 'Our Investment Advisory Services offer personalized guidance to help you build and manage a diversified portfolio. We align your investments with your goals, risk tolerance, and timeline for long-term financial growth.',
                'hover_image' => 'frontend/assets/img/home-1/service/hover.png',
            ],
            [
                'title'       => 'Business Financial Consulting',
                'number'      => '03',
                'icon'        => 'frontend/assets/img/home-1/icon/23.svg',
                'link'        => 'service-details.html',
                'description' => 'Business Financial Consulting provides strategic guidance on budgeting, forecasting, and financial performance. We help businesses optimize cash flow, reduce costs, and make data-driven decisions for sustainable growth and profitability.',
                'hover_image' => 'frontend/assets/img/home-1/service/hover.png',
            ],
            [
                'title'       => 'Debt Management & Reduction Plans',
                'number'      => '04',
                'icon'        => 'frontend/assets/img/home-1/icon/21.svg',
                'link'        => 'service-details.html',
                'description' => 'Our Debt Management & Reduction Plans are designed to help you regain control of your finances by minimizing debt, lowering interest costs, and creating a clear path toward long-term financial stability.',
                'hover_image' => 'frontend/assets/img/home-1/service/hover.png',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
