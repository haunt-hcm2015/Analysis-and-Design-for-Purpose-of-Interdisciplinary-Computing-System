# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Library(models.Model):
    _name = 'school.library'
    _description = 'School Library Model'
    library_name = fields.Char('Name')
    city_ids = fields.Many2many('city', string='City')
    postcode = fields.Integer('Postcode')
    country_id = fields.Many2one('country', string='Country')
    address_ids = fields.One2many('civil.status.address', string='Address')