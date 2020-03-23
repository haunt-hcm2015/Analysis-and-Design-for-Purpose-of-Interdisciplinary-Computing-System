# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class PublishingCompany(models.Model):
    _name = 'school.publishing.company'
    _description = 'Publishing Company Model'
    name = fields.Char('Publishing Company')
    city_id = fields.Many2many('city', string='City')
    postcode = fields.Integer('Postcode')
    country_id = fields.Many2one('country', string='Country')
    address_id = fields.One2many('civil.status.address', string='Address')

    

