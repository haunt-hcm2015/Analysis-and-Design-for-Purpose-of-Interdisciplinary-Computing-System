# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Scholarship(models.Model):
    _name = 'school.scholarship'
    _description = 'Scholarship Model'
    scholarship_contact_information_id = fields.Many2one('school.scholarship.contact.information', string='Scholarship Information')
    scholarship_name = fields.Char('Scholarship Name')
    scholarship_type_id = fields.Many2one('school.scholarship.type',string='Scholarship Type')
    scholar_committees_id = fields.Many2one('school.scholar.committees',string='Committees')
    scholar_description = fields.Char('Description')
    number_of_sponsor = fields.Integer('Number of Sponsors')
    description_scholarship_process = fields.Char()
    period = fields.Char('Stage of Offering')
    total_dolar = fields.Float('Total Dolar on Offer')
    date_created = fields.Date()
    date_closed = fields.Date()
    purpose_restriction = fields.Char()
    legal_note = fields.Char('Legal')
    agreement_file = fields.Binary ('File', help = "File import" )
    UPMIFA_status = fields.Char('Version Law Based on')
    offer_note = fields.Char('Offering Note')
    estimated_number_of_award_offer = fields.Integer()
    estimated_size_of_each_award = fields.Integer() 

class ScholarshipType(models.Model):
    _name = 'school.scholarship.type'
    _description = 'Scholarship Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
    description = fields.Char()
class ScholarshipRound(models.Model):
    _name = 'school.scholarship.round'
    _description = 'Scholarship Round Interview Model'
    name = fields.Char('Round Name')
    year = fields.Date('Calendar Year')
    fiscal_year = fields.Date('Fiscal Year')
class ScholarshipRoundDetail(models.Model):
    _name = 'school.scholarship.round.detail'
    _description = 'Scholarship Round Detail Model'
    scholarship_id = fields.Many2one('school.scholarship', string='Scholarship')
    round_id = fields.Many2one('school.scholarship.round', string='Scholarship Round')
    number_applicant = fields.Integer('Number of Applicant')
    number_award = fields.Integer('Number of Award')
    total_dollar = fields.Integer('Total Dollar Award')
class ScholarshipContactInformation(models.Model):
    _name = 'school.scholarship.contact.information'
    _description = 'Round Interview Model'
    scholarship_fund_number = fields.Integer()
    contact_name = fields.Char()
    address_ids = fields.One2many('civil.status.address', string='Contact Address')
    city_ids = fields.Many2many('city', string='Contact City')
    country_id = fields.Many2one('country', string='Country')
    postcode = fields.Integer('Postcode')
    note = fields.Char('Contact Note')
    phone = fields.Char()
    email = fields.Char()
    scholarship_id = fields.Many2one('school.scholarship', compute='compute_scholarship', inverse='scholarship_inverse')
    scholarship_ids = fields.One2many('school.scholarship', 'scholarship_contact_information_id')
    
    @api.depends('scholarship_ids')
    def compute_scholarship(self):
        if len(self.scholarship_ids) > 0:
            self.scholarship_id = self.scholarship_ids[0]
    def scholarship_inverse(self):
        if len(self.scholarship_ids) > 0:
            scholarship = self.env['school.scholarship'].browse(self.scholarship_ids[0].id)
            scholarship.scholarship_contact_information_id = False
        self.scholarship_id.scholarship_contact_information_id = self


class AwardCriteriaDetail(models.Model):
    _name = 'school.award.criteria.detail'
    _description = 'Award Criteria Detail Model'
    scholarship_id = fields.Many2one('school.scholarship', string='Scholarship')
    award_criteria_id = fields.Many2one('school.award.criteria', string='Award Criteria')
class AwardCriteria(models.Model):
    _name = 'school.award.criteria'
    _description = 'Award Criteria Model'
    description = fields.Char()
class Committees(models.Model):
    _name = 'school.scholar.committees'
    _description = 'Committees Model'
    name = fields.Char('Committees Name')
    department = fields.Char()
    contact = fields.Char('Contact Name')
    phone = fields.Char('Phone Number')
    email = fields.Char('Email')
    committees_member_ids = fields.Many2many('school.committees.member')
class CommitteesMember(models.Model):
    _name = 'school.committees.member'
    _description = 'Committees Member Model'
    last_name = fields.Char('Last Name')
    middle_name = fields.Char('Middle Name')
    first_name = fields.Char('First Name')
    other_name = fields.Char('Other Name')
    date_of_birth = fields.Date('Date of Birth')
    gender = fields.Selection([
                                ('male', 'Male'), 
                                ('female', 'Female')
                            ])
    home_town = fields.Char('Home Town')
    nation    = fields.Char('Nation')
    religion  = fields.Char('Religion')
    image     = fields.Image('Image')
    phone_number = fields.Char('Phone Number')
    address = fields.Many2many('civil.status.address')


    

