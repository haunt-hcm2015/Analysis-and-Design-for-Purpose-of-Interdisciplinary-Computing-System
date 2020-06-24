# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class CirriculumVitae(models.Model):
    _name = 'school.curriculum.vitae'
    _description = 'Cirriculum Vitae of Student Model'
    title_id = fields.Many2one('school.title')
    organization_ids = fields.Many2many('school.organization.title')
    skill_ids = fields.Many2many('school.skill.organization')
    education_ids = fields.Many2many('school.education')
    publication_ids = fields.Many2many('school.publication')
    reference_ids = fields.Many2many('school.references')
class Title(models.Model):
    _name = 'school.title'
    _description = 'Position Work Model'
    titleName = fields.Char('Title Name')
    titleDescription = fields.Char('Title Name')
class OrganizationTitle(models.Model):
    _name = 'school.organization.title'
    _description = 'The organization worked Model'
    title_id = fields.Many2one('school.title')
    organization_id = fields.Many2one('school.organization')
class Organization(models.Model):
    _name = 'school.organization'
    _description = 'The organization worked Model'
    organization_name = fields.Char()
    organization_industry = fields.Char()
    organization_description = fields.Char()
    organization_size = fields.Integer()
    organization_type_id = fields.Many2one('school.organization.type')
    date_start = fields.Date()
    date_end = fields.Date()
class OrganizationType(models.Model):
    _name = 'school.organization.type'
    _description = 'The organization Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
class SkillOrganization(models.Model):
    _name = 'school.skill.organization'
    _description = 'Work skill Model'
    skill_ids = fields.Many2many('school.skill')
    organization_id = fields.Many2one('school.organization')
class Skill(models.Model):
    _name = 'school.skill'
    _description = 'Skill Model'
    skill_name = fields.Char('SKill Name')
    skill_area = fields.Char('Area')
    skill_description = fields.Char('Description')
    date_start = fields.Date()
    date_end = fields.Date()
class Education(models.Model):
    _name = 'school.education'
    _description = 'Education Model'
    graduation_date = fields.Date()
    education_title = fields.Char('Title')
    education_type_id = fields.Many2one('school.education.type')
    institute = fields.Char()
    education_description = fields.Char('Description')
class EducationType(models.Model):
    _name = 'school.education.type'
    _description = 'The Education Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
class Publication(models.Model):
    _name = 'school.publication'
    _description = 'Publication Model'
    date_published = fields.Date()
    location = fields.Many2one('school.location')
    publication_type = fields.Many2one('school.publication.type')
    publication_description = fields.Char('Description')
class PublicationType(models.Model):
    _name = 'school.publication.type'
    _description = 'The Publication Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
class Location(models.Model):
    _name = 'school.location'
    _description = 'Location Model'
    country = fields.Many2one('country')
    city = fields.Many2one('civil.status.city')
    commune = fields.Many2one('civil.status.commune')
    date_start = fields.Date()
    date_end = fields.Date()
class References(models.Model):
    _name = 'school.references'
    _description = 'References Model'
    reference_title = fields.Char('Title')
    reference_description = fields.Char('Description')
    reference_type_id = fields.Many2one('school.references.type')
class ReferenceType(models.Model):
    _name = 'school.references.type'
    _description = 'The References Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()



    
