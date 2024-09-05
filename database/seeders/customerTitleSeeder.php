<?php

namespace Database\Seeders;

use App\Models\CustomerTitles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class customerTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer_titles')->delete();
        $data =  [    
          "Accountant",
        "Civil Engineer",
        "Mechanical Engineer",
        "Electrical Engineer",
        "Sales Representative",
        "Software Developer",
        "Teacher",
        "Doctor",
        "Nurse",
        "Pharmacist",
        "Lawyer",
        "Human Resources Specialist",
        "Marketing Specialist",
        "Customer Service Representative",
        "Architect",
        "Administrative Assistant",
        "Project Manager",
        "Business Analyst",
        "Data Analyst",
        "Graphic Designer",
        "IT Support Specialist",
        "Operations Manager",
        "Financial Analyst",
        "Quality Assurance Engineer",
        "Procurement Specialist",
        "Network Engineer",
        "Construction Manager",
        "Digital Marketing Specialist",
        "HR Manager",
        "Supply Chain Manager",
        "Content Creator",
        "Social Media Specialist",
        "Medical Representative",
        "Telecommunications Engineer",
        "Sales Manager",
        "Bank Teller",
        "Real Estate Agent",
        "Public Relations Officer",
        "Translator",
        "Event Planner",
        "Logistics Coordinator",];

        foreach ($data as $title) {
    
       CustomerTitles::create([
        "name"=>$title
       ]);
    }

    }
}