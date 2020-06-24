# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MarriageCertificateDetail(models.Model):
    _name = 'marriage.certificate.detail'
    _description = 'Marriage Certification Detail Model'
    marriage_certificate_id     = fields.Many2one('marriage.certificate', string="Marriage Certificate Info")   
    wife_id                     = fields.Many2one('citizen', string="Wife's Full Name")   
    husband_id                  = fields.Many2one('citizen', string="Husband's Full Name") 
    issue_date                  = fields.Date('Issue Date')
    issue_by                    = fields.Char('Issue By')