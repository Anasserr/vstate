<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 21,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 22,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 23,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 24,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 25,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 26,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 27,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 28,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 29,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 30,
                'title' => 'info_access',
            ],
            [
                'id'    => 31,
                'title' => 'setting_create',
            ],
            [
                'id'    => 32,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 33,
                'title' => 'setting_show',
            ],
            [
                'id'    => 34,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 35,
                'title' => 'setting_access',
            ],
            [
                'id'    => 36,
                'title' => 'country_create',
            ],
            [
                'id'    => 37,
                'title' => 'country_edit',
            ],
            [
                'id'    => 38,
                'title' => 'country_show',
            ],
            [
                'id'    => 39,
                'title' => 'country_delete',
            ],
            [
                'id'    => 40,
                'title' => 'country_access',
            ],
            [
                'id'    => 41,
                'title' => 'city_create',
            ],
            [
                'id'    => 42,
                'title' => 'city_edit',
            ],
            [
                'id'    => 43,
                'title' => 'city_show',
            ],
            [
                'id'    => 44,
                'title' => 'city_delete',
            ],
            [
                'id'    => 45,
                'title' => 'city_access',
            ],
            [
                'id'    => 46,
                'title' => 'region_create',
            ],
            [
                'id'    => 47,
                'title' => 'region_edit',
            ],
            [
                'id'    => 48,
                'title' => 'region_show',
            ],
            [
                'id'    => 49,
                'title' => 'region_delete',
            ],
            [
                'id'    => 50,
                'title' => 'region_access',
            ],
            [
                'id'    => 51,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 52,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 53,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 54,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 55,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 56,
                'title' => 'newsletter_create',
            ],
            [
                'id'    => 57,
                'title' => 'newsletter_edit',
            ],
            [
                'id'    => 58,
                'title' => 'newsletter_show',
            ],
            [
                'id'    => 59,
                'title' => 'newsletter_delete',
            ],
            [
                'id'    => 60,
                'title' => 'newsletter_access',
            ],
            [
                'id'    => 61,
                'title' => 'page_create',
            ],
            [
                'id'    => 62,
                'title' => 'page_edit',
            ],
            [
                'id'    => 63,
                'title' => 'page_show',
            ],
            [
                'id'    => 64,
                'title' => 'page_delete',
            ],
            [
                'id'    => 65,
                'title' => 'page_access',
            ],
            [
                'id'    => 66,
                'title' => 'contactu_create',
            ],
            [
                'id'    => 67,
                'title' => 'contactu_edit',
            ],
            [
                'id'    => 68,
                'title' => 'contactu_show',
            ],
            [
                'id'    => 69,
                'title' => 'contactu_delete',
            ],
            [
                'id'    => 70,
                'title' => 'contactu_access',
            ],
            [
                'id'    => 71,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 72,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 73,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 74,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 75,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 76,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 77,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 78,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 79,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 80,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 81,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 82,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 83,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 84,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 85,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 86,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 87,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 88,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 89,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 90,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 91,
                'title' => 'view_create',
            ],
            [
                'id'    => 92,
                'title' => 'view_edit',
            ],
            [
                'id'    => 93,
                'title' => 'view_show',
            ],
            [
                'id'    => 94,
                'title' => 'view_delete',
            ],
            [
                'id'    => 95,
                'title' => 'view_access',
            ],
            [
                'id'    => 96,
                'title' => 'finish_type_create',
            ],
            [
                'id'    => 97,
                'title' => 'finish_type_edit',
            ],
            [
                'id'    => 98,
                'title' => 'finish_type_show',
            ],
            [
                'id'    => 99,
                'title' => 'finish_type_delete',
            ],
            [
                'id'    => 100,
                'title' => 'finish_type_access',
            ],
            [
                'id'    => 101,
                'title' => 'slider_create',
            ],
            [
                'id'    => 102,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 103,
                'title' => 'slider_show',
            ],
            [
                'id'    => 104,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 105,
                'title' => 'slider_access',
            ],
            [
                'id'    => 106,
                'title' => 'service_create',
            ],
            [
                'id'    => 107,
                'title' => 'service_edit',
            ],
            [
                'id'    => 108,
                'title' => 'service_show',
            ],
            [
                'id'    => 109,
                'title' => 'service_delete',
            ],
            [
                'id'    => 110,
                'title' => 'service_access',
            ],
            [
                'id'    => 111,
                'title' => 'event_create',
            ],
            [
                'id'    => 112,
                'title' => 'event_edit',
            ],
            [
                'id'    => 113,
                'title' => 'event_show',
            ],
            [
                'id'    => 114,
                'title' => 'event_delete',
            ],
            [
                'id'    => 115,
                'title' => 'event_access',
            ],
            [
                'id'    => 116,
                'title' => 'event_management_access',
            ],
            [
                'id'    => 117,
                'title' => 'eventtag_create',
            ],
            [
                'id'    => 118,
                'title' => 'eventtag_edit',
            ],
            [
                'id'    => 119,
                'title' => 'eventtag_show',
            ],
            [
                'id'    => 120,
                'title' => 'eventtag_delete',
            ],
            [
                'id'    => 121,
                'title' => 'eventtag_access',
            ],
            [
                'id'    => 122,
                'title' => 'event_category_create',
            ],
            [
                'id'    => 123,
                'title' => 'event_category_edit',
            ],
            [
                'id'    => 124,
                'title' => 'event_category_show',
            ],
            [
                'id'    => 125,
                'title' => 'event_category_delete',
            ],
            [
                'id'    => 126,
                'title' => 'event_category_access',
            ],
            [
                'id'    => 127,
                'title' => 'eventuserstatus_create',
            ],
            [
                'id'    => 128,
                'title' => 'eventuserstatus_edit',
            ],
            [
                'id'    => 129,
                'title' => 'eventuserstatus_show',
            ],
            [
                'id'    => 130,
                'title' => 'eventuserstatus_delete',
            ],
            [
                'id'    => 131,
                'title' => 'eventuserstatus_access',
            ],
            [
                'id'    => 132,
                'title' => 'eventjoininguser_create',
            ],
            [
                'id'    => 133,
                'title' => 'eventjoininguser_edit',
            ],
            [
                'id'    => 134,
                'title' => 'eventjoininguser_show',
            ],
            [
                'id'    => 135,
                'title' => 'eventjoininguser_delete',
            ],
            [
                'id'    => 136,
                'title' => 'eventjoininguser_access',
            ],
            [
                'id'    => 137,
                'title' => 'event_discussion_create',
            ],
            [
                'id'    => 138,
                'title' => 'event_discussion_edit',
            ],
            [
                'id'    => 139,
                'title' => 'event_discussion_show',
            ],
            [
                'id'    => 140,
                'title' => 'event_discussion_delete',
            ],
            [
                'id'    => 141,
                'title' => 'event_discussion_access',
            ],
            [
                'id'    => 142,
                'title' => 'real_estate_managment_access',
            ],
            [
                'id'    => 143,
                'title' => 'project_create',
            ],
            [
                'id'    => 144,
                'title' => 'project_edit',
            ],
            [
                'id'    => 145,
                'title' => 'project_show',
            ],
            [
                'id'    => 146,
                'title' => 'project_delete',
            ],
            [
                'id'    => 147,
                'title' => 'project_access',
            ],
            [
                'id'    => 148,
                'title' => 'real_estate_unit_create',
            ],
            [
                'id'    => 149,
                'title' => 'real_estate_unit_edit',
            ],
            [
                'id'    => 150,
                'title' => 'real_estate_unit_show',
            ],
            [
                'id'    => 151,
                'title' => 'real_estate_unit_delete',
            ],
            [
                'id'    => 152,
                'title' => 'real_estate_unit_access',
            ],
            [
                'id'    => 153,
                'title' => 'real_estate_application_create',
            ],
            [
                'id'    => 154,
                'title' => 'real_estate_application_edit',
            ],
            [
                'id'    => 155,
                'title' => 'real_estate_application_show',
            ],
            [
                'id'    => 156,
                'title' => 'real_estate_application_delete',
            ],
            [
                'id'    => 157,
                'title' => 'real_estate_application_access',
            ],
            [
                'id'    => 158,
                'title' => 'applications_request_section_create',
            ],
            [
                'id'    => 159,
                'title' => 'applications_request_section_edit',
            ],
            [
                'id'    => 160,
                'title' => 'applications_request_section_show',
            ],
            [
                'id'    => 161,
                'title' => 'applications_request_section_delete',
            ],
            [
                'id'    => 162,
                'title' => 'applications_request_section_access',
            ],
            [
                'id'    => 163,
                'title' => 'real_estate_type_create',
            ],
            [
                'id'    => 164,
                'title' => 'real_estate_type_edit',
            ],
            [
                'id'    => 165,
                'title' => 'real_estate_type_show',
            ],
            [
                'id'    => 166,
                'title' => 'real_estate_type_delete',
            ],
            [
                'id'    => 167,
                'title' => 'real_estate_type_access',
            ],
            [
                'id'    => 168,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 169,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 170,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 171,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 172,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 173,
                'title' => 'available_for_mortgage_create',
            ],
            [
                'id'    => 174,
                'title' => 'available_for_mortgage_edit',
            ],
            [
                'id'    => 175,
                'title' => 'available_for_mortgage_show',
            ],
            [
                'id'    => 176,
                'title' => 'available_for_mortgage_delete',
            ],
            [
                'id'    => 177,
                'title' => 'available_for_mortgage_access',
            ],
            [
                'id'    => 178,
                'title' => 'realstate_purpose_create',
            ],
            [
                'id'    => 179,
                'title' => 'realstate_purpose_edit',
            ],
            [
                'id'    => 180,
                'title' => 'realstate_purpose_show',
            ],
            [
                'id'    => 181,
                'title' => 'realstate_purpose_delete',
            ],
            [
                'id'    => 182,
                'title' => 'realstate_purpose_access',
            ],
            [
                'id'    => 183,
                'title' => 'amenity_create',
            ],
            [
                'id'    => 184,
                'title' => 'amenity_edit',
            ],
            [
                'id'    => 185,
                'title' => 'amenity_show',
            ],
            [
                'id'    => 186,
                'title' => 'amenity_delete',
            ],
            [
                'id'    => 187,
                'title' => 'amenity_access',
            ],
            [
                'id'    => 188,
                'title' => 'near_create',
            ],
            [
                'id'    => 189,
                'title' => 'near_edit',
            ],
            [
                'id'    => 190,
                'title' => 'near_show',
            ],
            [
                'id'    => 191,
                'title' => 'near_delete',
            ],
            [
                'id'    => 192,
                'title' => 'near_access',
            ],
            [
                'id'    => 193,
                'title' => 'book_meeting_create',
            ],
            [
                'id'    => 194,
                'title' => 'book_meeting_edit',
            ],
            [
                'id'    => 195,
                'title' => 'book_meeting_show',
            ],
            [
                'id'    => 196,
                'title' => 'book_meeting_delete',
            ],
            [
                'id'    => 197,
                'title' => 'book_meeting_access',
            ],
            [
                'id'    => 198,
                'title' => 'like_create',
            ],
            [
                'id'    => 199,
                'title' => 'like_edit',
            ],
            [
                'id'    => 200,
                'title' => 'like_show',
            ],
            [
                'id'    => 201,
                'title' => 'like_delete',
            ],
            [
                'id'    => 202,
                'title' => 'like_access',
            ],
            [
                'id'    => 203,
                'title' => 'unit_comment_create',
            ],
            [
                'id'    => 204,
                'title' => 'unit_comment_edit',
            ],
            [
                'id'    => 205,
                'title' => 'unit_comment_show',
            ],
            [
                'id'    => 206,
                'title' => 'unit_comment_delete',
            ],
            [
                'id'    => 207,
                'title' => 'unit_comment_access',
            ],
            [
                'id'    => 208,
                'title' => 'form_request_access',
            ],
            [
                'id'    => 209,
                'title' => 'project_type_create',
            ],
            [
                'id'    => 210,
                'title' => 'project_type_edit',
            ],
            [
                'id'    => 211,
                'title' => 'project_type_show',
            ],
            [
                'id'    => 212,
                'title' => 'project_type_delete',
            ],
            [
                'id'    => 213,
                'title' => 'project_type_access',
            ],
            [
                'id'    => 214,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
