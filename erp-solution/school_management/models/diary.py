# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Diary(models.Model):
    _name = 'school.diary'
    _description = 'Diary model'
class SessionFact(models.Model):
    _name = 'school.session.fact'
    _description = 'Session Fact model'