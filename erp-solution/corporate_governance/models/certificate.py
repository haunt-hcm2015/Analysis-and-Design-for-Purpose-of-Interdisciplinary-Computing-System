# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Ceritificate(models.Model):
    _name = 'governance.certificate'
    _description = 'Certificate Model'
    certificate_number = fields.Integer()
    title = fields.Char()
    department = fields.Many2one('hr.department', string='Work Unit')
    person = fields.Many2one('citizen', string='Full Name')
    certificate_level_ids = fields.Many2many('governance.certificate.level', string='Certificate Level')
    issued_by = fields.Many2one('res.partner', string='Issued by')
    issued_at = fields.Date()
class CertificateLevel(models.Model):
    _name = 'governance.certificate.level'
    _description = 'Certificate Level Model'
    name = fields.Char('Level Name')
    description = fields.Char()
  